<?php

    // configuration
    require("../includes/config.php"); 


	
    

    	
    
				
    	$rows = query("SELECT * FROM users");
    	

    	
    	$positions = [];

		foreach ($rows as $row){

				 $address = query("SELECT * FROM addresses WHERE address_id = ? ",$row["address_id"]);


				 $positions[] = [ 

				 "user_id" => $row["user_id"],
				 "first_name" => $row["first_name"],
				 "last_name" => $row["last_name"],
				 "phone" => $row["phone"],
				 "username" => $row["username"],
				 "email" => $row["email"],
				 "lot_number" => $address[0]["lot_number"],
				 "address_line" => $address[0]["address_line"],
				 "town" => $address[0]["town"],
				 

			];	

		}

				


		
	
	     // render invoice
	    render("admin_users_t.php", ["positions" => $positions, "title" =>"Users"]);	
	


	

			

	    
    

	    
    

?>