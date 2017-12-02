<?php
	require("../includes/config.php"); 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
                $item_name = $_POST["item_name"];
                $item_price = $_POST["item_price"];
                $item_seller = $_POST["item_seller"];
                $item_image =$_POST["item_image"];
                $item_units =$_POST["item_units"];
                $p_id = $_POST["p_id"];
                $ava_amt = (int)$_POST["item_available_amt"];
                class Item {
                    function Item($name,$image,$seller,$units, $price, $id, $user_id,$ava_amt,$p_id)
                    {                        
                        $this->name = $name;
                        $this->image = $image;
                        $this->seller = $seller;
                        $this->units = $units;
                        $this->price = $price;
                        $this->id  = $id;
                        $this->user_id  = $user_id;
                        $this->ava_amt = $ava_amt;
                        $this->p_id = $p_id;

                    }
                }

                //check to see if item already exists in cart by looking at product image link 
                $image = query("SELECT image FROM cart WHERE image = ? LIMIT 1;", $item_image);
                

                if (empty($image)) 
                {                   
                
                    $sql = "INSERT INTO cart (product_name, units, seller, price, image, user_id,ava_amt,product_id) VALUES (?,?,?,?,?,?,?,?);";
                    $success = query($sql, $item_name, 1, $item_seller, $item_price, $item_image,$_SESSION["id"],$ava_amt,$p_id);
                    $rows = query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
                    $item = new Item($item_name,$item_image, $item_seller, $item_units,$item_price, $rows[0]["id"],$_SESSION["id"], $ava_amt,$p_id);
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
        $results = query($sql, $units,$item_id);
        
    }


?>