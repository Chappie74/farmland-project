<?php
	header('Content-Type: application/json');
    
    // configuration
    require("../includes/config.php"); 


    $products = query("SELECT product_id, name FROM products");

    

    $purchases = [];

    foreach ($products as $product){

     	$purchases[]=  query("SELECT amount FROM purchase_product WHERE product_id = ?", $product["product_id"]);

     	$purchases[]= $product["name"];
     	
     } 

     $sales = [];

    foreach ($products as $product){

     	$sales[] =  query("SELECT amount FROM sell_product WHERE product_id = ?", $product["product_id"]);

     	$sales[]= $product["name"];
     	
     } 



	
   

   

    print json_encode(array(
    	'purchaseData' =>$purchases,
    	'saleData'=>$sales, 
    	));
    	
    
	  

    

?>