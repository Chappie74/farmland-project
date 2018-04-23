<?php

require("../includes/config.php");
		
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$amount = abs((float)htmlentities(str_replace(',', '', $_POST["amount"]))); //strip any commas and cast as float

		if ($amount > 1000000.00) //check to see if deposit is greate than 1 mil
		{
			$amount = 1000000.00;
		}


		$added = $database->query("UPDATE users SET cash = cash + {$amount} WHERE id = ?",$_SESSION['id']);


		if($added === false)
		{
			apologize("Could not deposit funds at this time, please try again.");
		}

		redirect("../public/index.php");
	}

	render("../templates/depositForm.php", ["title" => "deposit"]);

?>
