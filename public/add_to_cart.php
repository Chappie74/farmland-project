<?php
	require("../includes/config.php"); 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
        	$item_name = $_POST["item_name"];
                $item_price = $_POST["item_price"];
                $item_seller = $_POST["item_seller"];
                $item_image =$_POST["item_image"];
                $item_units =$_POST["item_units"];

                class Item {
                    function Item($name,$image,$seller,$units, $price, $id, $user_id)
                    {                        
                        $this->name = $name;
                        $this->image = $image;
                        $this->seller = $seller;
                        $this->units = $units;
                        $this->price = $price;
                        $this->id  = $id;
                        $this->user_id  = $user_id;
                    }
                }

                $sql = "INSERT INTO cart (product_name, units, seller, price, image, user_id) VALUES (?,?,?,?,?,?);";
                $success = query($sql, $item_name, $item_units, $item_seller, $item_price, $item_image,$_SESSION["id"]);
                $rows = query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
                $item = new Item($item_name,$item_image, $item_seller, $item_units,$item_price, $rows[0]["id"],$_SESSION["id"]);
                
                echo json_encode($item);
                exit;
	}


?>