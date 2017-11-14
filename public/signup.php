<?php
	
	require("../includes/config.php");

	$email = "hi";
	dump($email);

	
?>



<!-- 
if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$lot_number = $_POST['lot_number'];
		$address_line = $_POST['address_line'];
		$town = $_POST['town'];
		$region = $_POST['region'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$cash = 1000000.00;
		$profile_picture = "img/profilePics/chappie.jpg";

		dump($email);
		// Check to see if all form data has been set
		if(isset($first_name) && isset($last_name) && isset($lot_number) && isset($town) && isset($region) && isset($email) && isset($username) && isset($password) && isset($phone))
		{
			dump($email);
			//prepare sql insert statement for addresses first
			$sql = "INSERT INTO addresses (lot_number, address_line, town, region) VALUES ({$lot_number}, {$address_line}, {$town}, {$region})";
			$address_results = query($sql); //execute query


			if($address_results !== false)
			{
				$last_address = query("SELECT LAST_INSERT_ID() AS id"); //retrieve the row of the last inserted item ie address
				$address_id = $last_address[0]["address_id"]; //store the id for that record in variable

				//prepare sql to insert into users next
				$sql = "INSERT INTO users (first_name, last_name, phone, username, password, email, cash, profile_picture, address_id) VALUES 
						({$first_name}, {$last_name}, {$phone}, {$username}, ?, {$email}, {$cash}, {$profile_picture}, ${address_id} )";
				$rows = query($sql, crypt($password)); //execute query


				if($row !== false)
				{
					$rows = query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
					$_SESSION["id"] = $rows[0]["id"]; //store it as session id
					reditect("index.php"); //reditect to index
				}	
				apologize("something went wrong");	
			}
			apologize("Something went wrong while signing up.");
		}

		apologize("Some form data was not set. Please try again.");
	}
	else
	{
		render("../templates/login_form.php", true);
	}

 -->