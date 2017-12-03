<?php

    // configuration
    require("../includes/config.php"); 


	
    

    	
    
				
    	$rows = query("SELECT * FROM purchase_product WHERE user_id = ?", $_SESSION["id"]);
    	

    	
    	$positions = [];

		foreach ($rows as $row){

				 $items = query("SELECT name FROM products WHERE product_id = ?", $row["product_id"]);
				 $b = $items[0]["name"];
				 $c = $row["total"];
				 $items = query("SELECT username FROM users WHERE user_id = ?", $row["seller_id"]);
				 $d = $items[0]["username"];
				 


				 $positions[] = [ 
				 "invoicenumber" => $row["purchase_product_id"],
				 "date" => $row["date_purchased"],
				 "units" => $row["amount"],
				 "product" => $b,
				 "total" => $c,
				 "client" => $d,
				 
				 ];
		}

				

				


		
	
	     // render invoice
	    render("invoice.php", ["positions" => $positions, "title" =>"Invoice"]);	
	


	

			

	    
    

	    
    

?>