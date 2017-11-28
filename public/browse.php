<?php
	require("../includes/config.php"); 
	$css = "../public/css/browse_t.css";

	class Product {
	    function Product($id, $name, $category, $image,$seller,$date_listed, $units, $price)
	    {
	    	$this->id = $id;
	        $this->name = $name;
	        $this->category = $category;
	        $this->image = $image;
	        $this->seller = $seller;
	        $this->date_listed = $date_listed;
	        $this->units = $units;
	        $this->price = $price;
	    }
	}

	$all_products = array(); //array to hold all products to send to page

	$sql = "SELECT * FROM products;";
	$results = query($sql);
	

	foreach ($results as $one) 
	{
		$sql = "SELECT name FROM categories WHERE category_id = ? LIMIT 1;";
		$category = query($sql, $one["category_id"]);
		$sql = "SELECT user_id,amount, amount,date_listed,price FROM products_for_sale WHERE product_id = ? LIMIT 1";
		$listing = query($sql, $one["product_id"]);
		$sql = "SELECT username FROM users WHERE user_id = ? LIMIT 1";
		$seller = query($sql, $listing[0]["user_id"]);
		$seller = $seller[0]["username"];	 	
		
		//create a new product object and populate it
		$product = new Product($one["product_id"],$one["name"],$category[0]["name"],$one["image"],$seller, $listing[0]["date_listed"], $listing[0]["amount"], $listing[0]["price"]);
		//push it to major projuct array
		array_push($all_products, $product);
	}

	render("../templates/browse_t.php", ["title" => "Browse", "css" => $css, "products"=> $all_products]);
?>