<?php
	require("../includes/config.php"); 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
                $item_name = $_POST["item_name"];
                $item_price = $_POST["item_price"];
                $item_seller = $_POST["item_seller"];
                $item_image =$_POST["item_image"];
                $item_units =$_POST["item_units"];
                $ava_amt = (int)$_POST["item_available_amt"];
                class Item {
                    function Item($name,$image,$seller,$units, $price, $id, $user_id,$ava_amt)
                    {                        
                        $this->name = $name;
                        $this->image = $image;
                        $this->seller = $seller;
                        $this->units = $units;
                        $this->price = $price;
                        $this->id  = $id;
                        $this->user_id  = $user_id;
                        $this->ava_amt = $ava_amt;

                    }
                }

                $sql = "INSERT INTO cart (product_name, units, seller, price, image, user_id,ava_amt) VALUES (?,?,?,?,?,?,?);";
                $success = query($sql, $item_name, 1, $item_seller, $item_price, $item_image,$_SESSION["id"],$ava_amt);
                $rows = query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
                $item = new Item($item_name,$item_image, $item_seller, $item_units,$item_price, $rows[0]["id"],$_SESSION["id"], $ava_amt);
                
                echo json_encode($item);
                exit;
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {   
        $item_id = $_GET["id"];
        $units = $_GET["units"];

        $sql = "UPDATE cart SET units = ? WHERE item_id = ?;";
        $results = query($sql, $units,$item_id);
        echo "done";
    }


?>