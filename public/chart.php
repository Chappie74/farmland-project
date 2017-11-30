<?php
	header('Content-Type: application/json');
    
    // configuration
    require("../includes/config.php"); 


    $products = query("SELECT product_id, name FROM products");

    $amount; 

    $purholder = [];
    $purchasesname = [];
   

    $purchases = [];

    foreach ($products as $product){  

     	$amount =  query("SELECT amount FROM purchase_product WHERE product_id = ?", $product["product_id"]);

        foreach ($amount as $amount){
            
           

            $purholder[] = $amount;


            
        }

     	$purchasesname[] = $product["name"];

        
        
        

        
     	
     } 

    // $sales = [];

    // $salholder = [];
    // $salholder2 = [];

    // foreach ($products as $product){

    //     $amount = query("SELECT amount FROM sell_product WHERE product_id = ? ", $product["product_id"]);

    //     foreach ($amount as $amount){
            
    //         $salholder[] = $amount;
            
    //         $salholder2 = $salholder;
    //         unset($salholder); 
            
    //     }
     
        
    //  	$salholder2[] = $product["name"];

    //     $sales[] = $salholder2;

        

           
     	
    //  } 



	


  
    print json_encode(array(
    	'purchaseName' =>$purchasesname,
        'purchaseAmount' =>$purholder,
    	// 'saleData'=>$sales, 
    	));
    	
    
	  

    

?>