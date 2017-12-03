<?php
// configuration
    require("../includes/config.php"); 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    	$user_id = $_SESSION["id"];
    	$first_name = (string)$_POST['first_name'];
		$last_name = (string)$_POST['last_name'];
		$lot_number = (string)$_POST['lot_number'];
		$address_line = (string)$_POST['address_line'];
		$town = (string)$_POST['town'];
		$region = $_POST['region'];
		$email = (string)$_POST['email'];
		$phone = (string)$_POST['phone'];

		if(isset($first_name) && isset($last_name) && isset($lot_number) && isset($town) && isset($region) && isset($email) && isset($address_line) && isset($phone))
		{
			//isnert the information for the users table
			$sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?,phone = ? WHERE user_id = ?;";
			$results = query($sql, $first_name, $last_name, $email, $phone, $user_id);

			//search for the user's address id
			$sql = "SELECT address_id FROM users where user_id = ? LIMIT 1;";
			$a_id = query($sql, $_SESSION['id']);

			$sql = "UPDATE addresses SET address_line = ?, town = ?, lot_number = ?, region = ? WHERE address_id = ?;";
            $results = query($sql, $address_line, $town, $lot_number, $region, $a_id[0]["address_id"]);



			if($results === false || $a_id === false)
			{
				apologize("Something went wrong.");				
			}
			$_SESSION['info_update_success'] = 1;			
			redirect("profile.php");
		}
    }

    //if no form submission was made. Do this by default

    // Query for user information
    $sql = "SELECT first_name, last_name, address_id, email, phone FROM users WHERE user_id = ? LIMIT 1";
    $user_info = query($sql, $_SESSION['id']);

    //Query for user address information
    $sql = "SELECT * FROM addresses WHERE address_id = ? LIMIT 1";
    $address_info = query($sql,$user_info[0]['address_id']);

    $first_name = $user_info[0]['first_name'];
    $last_name = $user_info[0]['last_name'];
    $email = $user_info[0]['email'];
    $phone = $user_info[0]['phone'];
    $town = $address_info[0]['town'];
    $lot_number = $address_info[0]['lot_number'];
    $address_line = $address_info[0]['address_line'];
    $region = $address_info[0]['region'];


    if($user_info != [] || $address_info != [] )
    {
        
    	render("../templates/profile_t.php",["first_name" => $first_name, "last_name" => $last_name, "email" => $email, "town" => $town, "lot_number" => $lot_number, "phone" => $phone, "address_line" => $address_line, "region" => $region]);
    }
    else
    {
    	apologize("Something went wrong loading user profile;");
    }

    
    

?>