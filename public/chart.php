<?php
	header('Content-Type: application/json');
    
    // configuration
    require("../includes/config.php"); 


    $products = query("SELECT product_id, name FROM products");

    $amount; 

    // $purholder = [];
    // $purchasesname = [];
   

    $purchases = [];

    foreach ($products as $product){  

     	$amount =  query("SELECT amount FROM purchase_product WHERE product_id = ?", $product["product_id"]);

        $amount = $amount[0]["amount"];
        
        echo $amount;

       

     	// $purchasesname[] = $product["name"];

        
        
        

        
     	
     } 

    



	


  
    // print json_encode(array(
    // 	'purchaseName' =>$purchasesname,
    //     'purchaseAmount' =>$purholder,
    // 	// 'saleData'=>$sales, 
    // 	));
    	
    
	  

    

?>