<?php
	require("../includes/config.php"); 
	require_once("../includes/classes.php"); 
	$css = "../public/css/browse_t.css";
	$script ="../public/js/browse_t.js";

	

	$all_products = array(); //array to hold all products to send to page

	$sql = "SELECT * FROM products;";
	$results = $database->query($sql);
	

	foreach ($results as $one) 
	{
		$sql = "SELECT * FROM prodcuts WHERE name = ?";
		$products = $database->query($sql, $one["name"]);

		foreach ($products as $product) {
			
		}


		$sql = "SELECT name FROM categories WHERE category_id = ? LIMIT 1;";
		$category = $database->query($sql, $one["category_id"]);
		$sql = "SELECT user_id,amount,date_listed,price FROM products_for_sale WHERE 	 = ? AND amount >= 1 LIMIT 1";
		$listing = $database->query($sql, $one["product_id"]);
		$sql = "SELECT username FROM users WHERE user_id = ? LIMIT 1";
		$seller = $database->query($sql, $listing[0]["user_id"]);
		$seller = $seller[0]["username"];	 	
		
		//create a new product object and populate it
		$product = new Product($one["product_id"],$one["name"],$category[0]["name"],$one["image"],$seller, $listing[0]["date_listed"], $listing[0]["amount"], $listing[0]["price"]);
		//push it to major projuct array
		array_push($all_products, $product);
	}

	$sql = "SELECT item_id, product_name, units, price, seller, image, ava_amt FROM cart WHERE user_id = ?;";
	$cart_items = $database->query($sql, $_SESSION["id"]);



	render("../templates/browse_t.php", ["title" => "Browse", "css" => $css, "script" => $script ,"products"=> $all_products, "cart_items" => $cart_items,"cart_total" => 0]);
?>