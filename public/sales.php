<?php

    // configuration
    require("../includes/config.php"); 


	
    

    	
    
				
    	$rows = query("SELECT * FROM sell_product WHERE user_id = ?", $_SESSION["id"]);
    	
    	$positions = [];

		foreach ($rows as $row){

				 $items = query("SELECT name, price FROM products WHERE product_id = ?", $row["product_id"]);
				 $z = $items[0];
				 $b = $z["name"];
				 $c = $z["price"];

				 $positions[] = [
				 "invoicenumber" => $row["sell_product_id"],
				 "date" => $row["date_purchased"],
				 "units" => $row["amount"],
				 "product" => $row["product_id"],
				 "total" => $c * $row["amount"],
				 
				 ];

			}	

				


		
	
	     // render sales
	    render("sales.php", ["positions" => $positions, "title" =>"Sales"]);	
	


	

			

	    
    

	    
    

?>