<?php 
	require("../includes/config.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["product_name"]))
		{
			$product_name = strtolower($_POST["product_name"]);
			$all_names = array();
			
			$sql = "SELECT DISTINCT name FROM products WHERE name LIKE '%{$product_name}%' ";
			$rows = query($sql);
			foreach ($rows as $row) 
			{
				array_push($all_names, $row["name"]);
			}

			$names = array_unique($all_names);			
			echo json_encode(array_unique($names));
			exit;
		}
	}

?>