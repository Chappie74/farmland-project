<?php 

	require("../includes/config.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$amountToBuy = (int)$_POST["amount"]; //store the amount of shares user wished to buy
		$valid_amount = preg_match("/^\d+$/",$_POST["amount"]);
		if($amountToBuy <= 0 ||  $valid_amount === true) //check to see if amount of shares to buy is correct
		{
			apologize("Invalid amount entered. Try again.");
		}

		$symbol =  strtoupper($_POST["symbol"]); //stores the symbol of the shares user wishes to buy
		$results = lookup($symbol); // look up the info for the company based on symbol
		$amountToBuy = (int)$amountToBuy; //sotre amount of shares to buy as an int

		if($results["name"] === "N/A") //check to see if symbol was a valid one
			apologize("Could not find company. Try again.");

		$pricePerShare = str_replace(',', '', $results["price"]); //store the price per share and remove commas
		$totalCost = ($amountToBuy * $pricePerShare); //calculte the total cost to user
		$userInfo = $database->query("SELECT * FROM users WHERE id = ?;", $_SESSION['id']);

		if($userInfo[0]["cash"] < $totalCost) //check to see if user has enough money for the purchase
			apologize("Insufficient funds.");		

		$payment = $database->query("UPDATE users SET cash = cash - {$totalCost} WHERE id = ?", $_SESSION['id']);//deduct cost for shares from user cash
		if($payment === false) //check to see if deduction was successful
			apologize("Could not deduct payment. Transaction failed, try again.");

		$userassets = $database->query("SELECT * FROM assets WHERE  id = ?;", $_SESSION['id']); //collect all assets info on user
		$hasShares = 0;
		foreach ($userassets as $row)   //check each row to see if user already has shares from a company
		{
			if ($row["symbol"] === (string)$symbol)
			{
				$hasShares = 1; 
				break; //break out of loop if a match is found
			}
			
		}
		
		if($hasShares !=0 )
		{
			$sql="UPDATE assets SET shares = shares + {$amountToBuy} WHERE symbol = \"{$symbol}\" AND id = ?;";
		}
		else
		{
			$sql="INSERT INTO assets (id, symbol, shares) VALUES (?, \"{$symbol}\", {$amountToBuy}); ";	
		}
		
		$sharesReceived = $database->query($sql,$_SESSION['id']);
		
		if($sharesReceived === false) //check to see if shares was added to user account
		{
			$database->query("UPDATE users SET cash = cash + {$totalCost} WHERE id = ?;", $_SESSION['id']); //rollback payment
			apologize("Transactions was not successful. Please try again...");
		}

		$date = date("Y-m-d H:i:s"); //get current date and time

		//prepare $database->query to make log of transaction
		$sql = "INSERT INTO history (id, transaction_type, symbol, shares, price, date_time)  
				VALUES (?,'Bought', '{$symbol}', {$amountToBuy}, {$pricePerShare},'{$date}')";

		$added = $database->query($sql, $_SESSION['id']); //execute $database->query
		
		if($added === false) //if $database->query failed, rollback transaction
		{
			//determine how to roll back shares
			if($hasShares !=0 )
			{
				$sql="UPDATE assets SET shares = shares - {$amountToBuy} WHERE symbol = \"{$symbol}\" AND id = ?;";
			}
				else
			{
				$sql="DELETE FROM assets WHERE id = ? AND symbol = '{$symbol}' AND shares = {$amountToBuy};";
			}

			$database->query($sql, $_SESSION['id']);
			$database->query("UPDATE users SET cash = cash + {$totalCost} WHERE id = ?", $_SESSION['id']); //rollback payment
			apologize("Could not make a record of tranaction, thus transaction rolled back. Try again.");
		}

		redirect("index.php");

	}
	else
	{
		render("../templates/buyStock.php", ["title" => "Buy Stock"]);
	}

?>
