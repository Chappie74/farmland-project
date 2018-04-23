<?php
	
	require("../includes/config.php");
	require_once("../includes/classes.php");
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
			$user = new User($first_name,$last_name, $lot_number, $address_line, $town, $region, $email, $username, $password, $phone, $profile_picture);
			

			//prepare sql insert statement for addresses first
			$sql = "INSERT INTO addresses (lot_number, address_line, town, region) VALUES (?, ?, ?, ?)";
			$address_results = $database->query($sql,$user->lot_number, $user->address_line, $user->town, $user->region); //execute $database->query


			if($address_results !== false)
			{
				$last_address = $database->query("SELECT LAST_INSERT_ID() AS id"); //retrieve the row of the last inserted item ie address				
				$address_id = $last_address[0]["id"]; //store the id for that record in variable
				
				//prepare sql to insert into users next
				$sql = "INSERT INTO users (first_name, last_name, phone, username, password, email, cash, profile_picture, address_id) VALUES 
						(?, ?, ?, ?, ?, ?, ?,?, ?)";
				$rows = $database->query($sql,$user->first_name, $user->last_name, $user->phone, $user->username, crypt($user->password, $salt), $user->email, $user->cash, $user->profile_picture, $address_id); //execute $database->query


				if($rows !== false)
				{
					$rows = $database->query("SELECT LAST_INSERT_ID() AS id"); //retrieve last insert id
					$_SESSION["id"] = $rows[0]["id"]; //store it as session id
					redirect("index.php"); //reditect to index
				}	
				apologize("something went wrong");	
			}
			apologize("Something went wrong while signing up.");
		}

		apologize("Some form data was not set. Please try again.");
	}
	//if login was pressed
	else if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["btn_type"] == "login") //if login was pressed
	{
		$username = (string)$_POST["username"];
		$password = (string)$_POST["password"];
		

		$sql = "SELECT * FROM users WHERE username = ? OR email = ? AND password = ? LIMIT 1";
		$rows = $database->query($sql, $username, $username,crypt($password,$salt));
		
		
		if($rows != [])
		{
			$_SESSION["id"] = $rows[0]["user_id"];
			redirect("index.php");
		}
		apologize("Could not find a Username with the correspoinding password in the database. Consider signing up.");


	}

	render("../templates/login_form.php", [] ,true);
?>

