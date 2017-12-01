<?php
	require("../includes/config.php"); 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
        $cart_id = $_POST["id"];
        $sql = "DELETE FROM cart WHERE item_id = ? LIMIT 1";
        $results = query($sql, $cart_id);

        echo "success";
	}
    else if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if(isset($_GET["empty"]) && $_GET["empty"] == "true")
        {
            $sql = "DELETE FROM cart;";
            $results = query($sql);
            echo "done";
        } 
    }



?>