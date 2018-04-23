<?php
	// configuration
	require("../includes/config.php"); 
	// if form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if((isset($_POST["username"]) && !empty($_POST["username"])) && 
			(isset($_POST["password"]) && !empty($_POST["password"])) &&
			(isset($_POST["confirmation"]) && !empty($_POST["confirmation"])))
		{
			if($_POST["password"] !== $_POST["confirmation"])
			{
				apologize("Password and confirmation does not match");
			}
			else
			{
				$results = $database->query("INSERT INTO users (username, hash, cash) VALUES(?, ?,100000000.00)", $_POST["username"], crypt($_POST["password"]));

				if($results === false)
				{
					apologize("It appears this username is already in our system. Please try another.");
				}
				else
				{
					$rows = $database->query("SELECT LAST_INSERT_ID() AS id");
					$_SESSION["id"] = $rows[0]["id"];
					redirect("index.php");
				}
			}
		}
		else
		{
			apologize("All form fields must be filled.");
		}
	}
		else
	{
	// else render form
		render("register_form.php", ["title" => "Register"]);
	}
?>