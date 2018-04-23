<?php 

	require("../includes/config.php"); 
	require_once("../includes/classes.php"); 
	#get all items from cart
	$sql = "SELECT price, units, seller FROM cart WHERE user_id = ?;";
	$rows = $database->query($sql, $_SESSION["id"]);
	$total_cost = 0;
	$total_seller_gain = 0;

	

	#go through each one
	foreach ($rows as $value) 
	{	
		$total_seller_gain = 0;
		#calculate total cost of all items
		$total_cost += $value["price"] * $value["units"];

		#select all items from a paricular seller	
		$sql = "SELECT units, price, product_id, units FROM cart WHERE seller = ?;";
		$results = $database->query($sql,$value["seller"]);
		//get the seller's user id;
		$sql = "SELECT user_id FROM users WHERE username = ? LIMIT 1;";
		$seller_id = $database->query($sql, $value["seller"]);



		#go through those items
		foreach ($results as $value)
		{
			#calculate that seller's total gain
			$total_seller_gain += $value["price"] * $value["units"];
			#insert into the sell table
			$sql = "INSERT INTO sell_product (user_id, product_id, date_sold, amount, total,buyer_id) VALUES (?,?,CURRENT_DATE(),?,?,?);";
			$done =  $database->query($sql, $seller_id[0]["user_id"], $value["product_id"], $value["units"], $value["price"] * $value["units"],$_SESSION["id"]);	
			#insert into the purchase table
			$sql = "INSERT INTO purchase_product (user_id, product_id, date_purchased, amount, total,seller_id) VALUES (?,?,CURRENT_DATE(),?,?,?);";
			$done =  $database->query($sql, $_SESSION["id"], $value["product_id"], $value["units"], $value["price"] * $value["units"],$seller_id[0]["user_id"]);

			#update the items for sale table
			$sql  = "UPDATE products_for_sale SET amount = amount - ? WHERE product_id = ?;";
			$done = $database->query($sql, $value["units"], $value["product_id"]);
		}		
		
		//update the cash for that seller
		$sql = "UPDATE users SET cash  = cash + ? WHERE user_id = ? LIMIT 1;";
		$success = $database->query($sql, $total_seller_gain, $seller_id[0]["user_id"]);

	}



	#reduce the buyer's cash
	$database->query("DELETE FROM cart WHERE user_id = ?", $_SESSION["id"]);
	$sql = "UPDATE users SET cash  = cash - ? WHERE user_id = ? LIMIT 1;";
	$sucess = $database->query($sql, $total_cost,$_SESSION["id"]);

	redirect("../public/browse.php");
?>