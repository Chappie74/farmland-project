<?php
	require("../includes/config.php"); 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$item_name = $_POST["item_name"];
        $item_price = $_POST["item_price"];
        $item_date = $_POST["item_date"];
        $item_seller = $_POST["item_seller"];

        echo $item_name;
	}


?>