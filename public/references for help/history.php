<?php 
	
	require("../includes/config.php");

	$rows = query("SELECT * FROM history WHERE id = ? ORDER BY hisID DESC", $_SESSION['id']);
	if($rows === false)
	{
		apologize("Could not query database for history. Try again later.");
	}

	render("../templates/history.php", ["title" => "History", "rows" => $rows]);
	
	
?>