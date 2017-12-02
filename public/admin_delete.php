<?php

    // configuration
    require("../includes/config.php"); 


	
    

    	// echo 'Hello ' . htmlspecialchars($_GET["id"]) . '!';
    	

				
    	$rows = query("DELETE FROM users WHERE user_id = ?",$_GET["id"];);




		
	
	    
	     
	    redirect("admin_users.php");	
	


	


	

			

	    
    

	    
    

?>