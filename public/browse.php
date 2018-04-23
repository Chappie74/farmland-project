<?php
	require("../includes/config.php"); 
	$css = "../public/css/browse_t.css";
	$script ="../public/js/browse_t.js";

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
	class Item {
                    function Item($name,$image,$seller,$units, $price, $id)
                    {                        
                        $this->name = $name;
                        $this->image = $image;
                        $this->seller = $seller;
                        $this->units = $units;
                        $this->price = $price;
                        $this->id  = $id;
                    }
                }

	$all_products = array(); //array to hold all products to send to page

	$sql = "SELECT * FROM products;";
	$results = query($sql);
	

	foreach ($results as $one) 
	{
		$sql = "SELECT name FROM categories WHERE category_id = ? LIMIT 1;";
		$category = query($sql, $one["category_id"]);
		$sql = "SELECT user_id,amount,date_listed,price FROM products_for_sale WHERE product_id = ? AND amount >= 1 LIMIT 1";
		$listing = query($sql, $one["product_id"]);
		$sql = "SELECT username FROM users WHERE user_id = ? LIMIT 1";
		$seller = query($sql, $listing[0]["user_id"]);
		$seller = $seller[0]["username"];	 	
		
		//create a new product object and populate it
		$product = new Product($one["product_id"],$one["name"],$category[0]["name"],$one["image"],$seller, $listing[0]["date_listed"], $listing[0]["amount"], $listing[0]["price"]);
		//push it to major projuct array
		array_push($all_products, $product);
	}

	$sql = "SELECT item_id, product_name, units, price, seller, image, ava_amt FROM cart WHERE user_id = ?;";
	$cart_items = query($sql, $_SESSION["id"]);



	render("../templates/browse_t.php", ["title" => "Browse", "css" => $css, "script" => $script ,"products"=> $all_products, "cart_items" => $cart_items,"cart_total" => 0]);
?>