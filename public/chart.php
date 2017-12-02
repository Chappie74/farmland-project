<?php
	header('Content-Type: application/json');
    
    // configuration
    require("../includes/config.php"); 


    $products = query("SELECT product_id, name FROM products");


    $amount; 
    $total = 0;
   
    $data = [];

    foreach ($products as $product){ 


     	$amount =  query("SELECT amount FROM purchase_product WHERE product_id = ?", $product["product_id"]);

        foreach ($amount as $amount){
            $total += $amount["amount"];
        }
        
        $data[]=[
        "name"=> $product["name"],
        "total"=>$total,
        ];

        $total = 0;
     	
     } 

    



	


  
    print json_encode($data);
    	
    
	  

    

?>