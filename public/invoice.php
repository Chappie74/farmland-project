<?php

    // configuration
    require("../includes/config.php"); 


	
    

    	
    
				
    	$rows = query("SELECT * FROM purchase_product WHERE user_id = ?", $_SESSION["id"]);
    	
    	$positions = [];

		foreach ($rows as $row){

				 $positions[] = [
				 "invoicenumber" => $row["purchase_product_id"],
				 "date" => $row["date_purchased"],
				 "units" => $row["amount"],
				 "product" => $row["product_id"],
				 
				 ];

			}	

				


		
	
	     // render invoice
	    render("invoice.php", ["positions" => $positions, "title" =>"Invoice"]);	
	


	

			

	    
    

	    
    

?>