<?php

    // configuration
    require("../includes/config.php");    

    	
    
				
    	$rows = $database->query("SELECT * FROM sell_product WHERE user_id = ?", $_SESSION["id"]);
    	
    	$positions = [];

		foreach ($rows as $row){

				 $items = $database->query("SELECT name FROM products WHERE product_id = ?", $row["product_id"]);
				 $b = $items[0]["name"];
				 $c = $row["total"];
				 $items = $database->query("SELECT username FROM users WHERE user_id = ?", $row["buyer_id"]);
				 $d = $items[0]["username"];

				
				 

				 $positions[] = [
				 "salenumber" => $row["sell_product_id"],
				 "date" => $row["date_sold"],
				 "units" => $row["amount"],
				 "product" => $b,
				 "total" => $c, 
				 "client" => $d,
				 
				 ];

			}	

				


		
	
	     // render sales
	    render("sales.php", ["positions" => $positions, "title" =>"Sales"]);	
	


	

			

	    
    

	    
    

?>