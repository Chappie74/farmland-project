<?php
	
	require("../includes/config.php");
		
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$symbol = strtoupper($_POST["symbol"]);
		$results = lookup($symbol); //look up yahoo for the data based on the symbol
		$sharesToSell = (int)$_POST["amount"]; //store the amount of shares user wished to sell
		$price = str_replace(',', '', $results["price"]); //store the current price per share based on yahoo's data and rmeove commas
		$income = $_POST["amount"] * $price; //calculate the amount of money to be added to users balance

		
		$sql = "SELECT * FROM assets WHERE id = ? AND symbol = \"{$symbol}\";"; //prepare sql statement to find a particular  user and his/her shares
		$rows = query($sql, $_SESSION['id']); //execute the query
		$currentShares = (int)$rows[0]["shares"]; //amount of shares user currently has 

		//check to see if user is trying to more than current shares or 0 and less  shares
		if($sharesToSell <= 0 || $currentShares < $sharesToSell) 
		{
			apologize("Trying to sell invalid amount. Please try again.");
		}

		$sql = "UPDATE assets SET shares = shares - {$sharesToSell} WHERE id = ? AND symbol = \"{$symbol}\"; "; //prepare shares deduction query
		$OK = query($sql, $_SESSION['id']); //execute query

		
		if($OK === false) //if query not successful
		{
			apologize("Something went wrong in deducting shares from user. Try again.");
		}


		$sql = "UPDATE users SET cash = cash + {$income} WHERE id = ?;"; //prepare cash increase query
		$OK = query($sql, $_SESSION["id"]); //execute query

		if ($OK === false) //if query not successful
		{
			//restore shares once deleted
			$sql = "UPDATE assets SET shares = shares + {$sharesToSell} WHERE id = ? \"{$symbol}\";"; //prepare shares addition query
			$OK = query($sql, $_SESSION['id']);
			apologize('Something went wrong adding cash. Sale not completed.');
		}
		
		//check to see if user is selling all of current shares
		if($sharesToSell == $currentShares)
		{
			$sql = "DELETE FROM assets WHERE id = ? AND symbol = \"{$symbol}\"";
			
			$deleted = query($sql, $_SESSION['id']); //remove entire row from database

		}

		$date = date("Y-m-d H:i:s"); //get current date and time

		//prepare query to make log of transaction
		$sql = "INSERT INTO history (id, transaction_type, symbol, shares, price, date_time)  
				VALUES (?,'Sold', '{$symbol}', {$sharesToSell}, {$price},'{$date}')";
		$added = query($sql,$_SESSION['id']); //execute query

		//check to see if query was successful
		if($added === false) //roll back transactions
		{
			//remove cash added
			$sql = "UPDATE users SET cash = cash - {$income} WHERE id = ?;"; //roll back cash increase
			$OK = query($sql, $_SESSION["id"]); //execute query
			//restore shares once deleted
			$sql = "UPDATE assets SET shares = shares + {$sharesToSell} WHERE id = ? \"{$symbol}\";"; //roll back shares decrease
			$OK = query($sql, $_SESSION['id']);
		}

		//if everything went well
		redirect("index.php");
	}
	else
	{
		$symbol = $_GET["symbol"]; //store the symbol passed in the url from portfolio	
		$currentShares = $_GET["shares"]; //store the amount of hsres passed in the url from portfolio
		render("../templates/sellStock.php", ["title" => "Sell Stock", "symbol" => $symbol, "shares" => $currentShares]);
	}
?>