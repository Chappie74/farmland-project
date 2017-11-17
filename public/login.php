<?php
	
	require("../includes/config.php");
	$salt = "2a07usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi";
	//determine whether the form was submitted and which button was pressed. (signup/login)
	if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["btn_type"] == "signup") //if signup was pressed
	{
		$first_name = (string)$_POST['first_name'];
		$last_name = (string)$_POST['last_name'];
		$lot_number = (string)$_POST['lot_number'];
		$address_line = (string)$_POST['address_line'];
		$town = (string)$_POST['town'];
		$region = $_POST['region'];
		$email = (string)$_POST['email'];
		$username = (string)$_POST['username'];
		$password = (string)$_POST['password'];
		$phone = (string)$_POST['phone'];
		$cash = 1000000.00;
		$profile_picture = "img/profilePics/chappie.jpg";

		
		// Check to see if all form data has been set
		if(isset($first_name) && isset($last_name) && isset($lot_number) && isset($town) && isset($region) && isset($email) && isset($username) && isset($password) && isset($phone))
		{
			
			//prepare sql insert statement for addresses first
			$sql = "INSERT INTO addresses (lot_number, address_line, town, region) VALUES (?, ?, ?, ?)";
			$address_results = query($sql,$lot_number, $address_line, $town, $region); //execute query


			if($address_results !== false)
			{
				$last_address = query("SELECT LAST_INSERT_ID() AS id"); //retrieve the row of the last inserted item ie address				
				$address_id = $last_address[0]["id"]; //store the id for that record in variable
				
				//prepare sql to insert into users next
				$sql = "INSERT INTO users (first_name, last_name, phone, username, password, email, cash, profile_picture, address_id) VALUES 
						(?, ?, ?, ?, ?, ?, ?,?, ?)";
				$rows = query($sql,$first_name, $last_name, $phone, $username, crypt($password, $salt), $email, $cash, $profile_picture, $address_id); //execute query


				if($row !== false)
				{
					$rows = query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
					$_SESSION["id"] = $rows[0]["id"]; //store it as session id
					redirect("index.php"); //reditect to index
				}	
				apologize("something went wrong");	
			}
			apologize("Something went wrong while signing up.");
		}

		apologize("Some form data was not set. Please try again.");
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["btn_type"] == "login") //if login was pressed
	{
		$username = (string)$_POST["username"];
		$password = (string)$_POST["password"];

		$sql = "SELECT * FROM users WHERE username = ? OR email = ? AND password = ? LIMIT 1";
		$rows = query($sql, $username, $username,crypt($password,$salt));
		
		
		if($rows != [])
		{
			$_SESSION["id"] = $rows[0]["user_id"];
			redirect("index.php");
		}
		apologize("Could not find a Username with the correspoinding password in the database. Consider signing up.");


	}

	render("../templates/login_form.php", [] ,true);
?>

