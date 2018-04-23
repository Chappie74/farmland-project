<?php
	require("../includes/config.php"); 
    require_once("../includes/classes.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
                $item_name = $_POST["item_name"];
                $item_price = $_POST["item_price"];
                $item_seller = $_POST["item_seller"];
                $item_image =$_POST["item_image"];
                $item_units =$_POST["item_units"];
                $p_id = $_POST["p_id"];
                $ava_amt = (int)$_POST["item_available_amt"];
                

                //check to see if item already exists in cart by looking at product image link 
                $image = $database->query("SELECT image FROM cart WHERE image = ? LIMIT 1;", $item_image);
                

                if (empty($image)) 
                {                   
                
                    $sql = "INSERT INTO cart (product_name, units, seller, price, image, user_id,ava_amt,product_id) VALUES (?,?,?,?,?,?,?,?);";
                    $success = $database->query($sql, $item_name, 1, $item_seller, $item_price, $item_image,$_SESSION["id"],$ava_amt,$p_id);
                    $rows = $database->query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
                    $item = new cartItem($item_name,$item_image, $item_seller, $item_units,$item_price, $rows[0]["id"],$_SESSION["id"], $ava_amt,$p_id);
                    echo json_encode($item);
                }
                else
                {   
                    $exists = 1;                        
                    echo json_encode($exists);
                }
                
                
                exit;
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {   
        $item_id = $_GET["id"];
        $units = $_GET["units"];

        $sql = "UPDATE cart SET units = ? WHERE item_id = ?;";
        $results = $database->query($sql, $units,$item_id);
        
    }


?>