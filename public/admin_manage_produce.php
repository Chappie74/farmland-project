<?php

	require("../includes/config.php"); 
	$css = "../public/css/browse_t.css";
	$script ="../public/js/browse_t.js";


	if($_SERVER['REQUEST_METHOD'] == "POST")
    {	
    	$user_id = $_POST['user_id'];
    	$product_id = $_POST['product_id'];
    	$product_category_id = $_POST['product_category_id'];
    	$product_name = $_POST['product_name'];
    	$product_category = (string)$_POST['product_category'];
    	$product_units = (string)$_POST['product_units'];
		$product_price = (string)$_POST['product_price'];
		

		if(isset($product_name) && isset($product_category) && isset($product_units) && isset($product_price))
		{	

			//search for the category id
			$sql = "SELECT category_id FROM categories where name = ? LIMIT 1;";
			$cat = query($sql, $_POST['product_category']);
			$product_category_id = $cat[0]["category_id"];

			//isnert the information for the users table
			$sql = "UPDATE products SET name = ? , category_id = ? WHERE product_id = ?;";
			$results = query($sql, $product_name, $product_category_id, $product_id);


			$sql = "UPDATE products_for_sale SET amount = ? , price = ? WHERE product_id = ?;";
			$results = query($sql, $product_units, $product_price, $product_id);


			if($results === false || $a_id === false)
			{
				apologize("Something went wrong.");				
			}
			$_SESSION['info_update_success'] = 1;			
			redirect("admin_manage_produce.php");
		}

    }

	
	class Product {
	    function Product($user_id, $id, $name, $category , $category_id , $image,$seller,$date_listed, $units, $price)
	    {
	    	$this->user_id = $id;
	    	$this->id = $id;
	        $this->name = $name;
	        $this->category = $category;
	        $this->category_id = $category_id;
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
		$product = new Product($listing[0]["user_id"],$one["product_id"],$one["name"],$category[0]["name"],$one["category_id"],$one["image"],$seller, $listing[0]["date_listed"], $listing[0]["amount"], $listing[0]["price"]);
		//push it to major product array
		array_push($all_products, $product);
	}

	render("admin_manage_produce_t.php", ["title" => "Browse", "css" => $css, "script" => $script ,"products"=> $all_products]);
?>