<?php 
	require("../includes/config.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["product_name"]))
		{
			$product_name = $_POST["product_name"];

			$sql = "SELECT name FROM products WHERE name LIKE '%{$product_name}%' ";
			$rows = query($sql);
			echo json_encode($rows);
			exit;
		}
	}

?>