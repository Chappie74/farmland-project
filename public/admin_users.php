<?php
// configuration
    require("../includes/config.php"); 

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    	$user_id = $_POST['user_id'];
    	$username = (string)$_POST['username'];
    	$first_name = (string)$_POST['first_name'];
		$last_name = (string)$_POST['last_name'];
		$lot_number = (string)$_POST['lot_number'];
		$address_line = (string)$_POST['address_line'];
		$town = (string)$_POST['town'];
		$region = $_POST['region'];
		$email = (string)$_POST['email'];
		$phone = (string)$_POST['phone'];

		if(isset($username) && isset($first_name) && isset($last_name) && isset($lot_number) && isset($town) && isset($region) && isset($email) && isset($address_line) && isset($phone))
		{
			//isnert the information for the users table
			$sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ?,phone = ? WHERE user_id = ?;";
			$results = $database->query($sql, $username, $first_name, $last_name, $email, $phone, $user_id);

			//search for the user's address id
			$sql = "SELECT address_id FROM users where user_id = ? LIMIT 1;";
			$a_id = $database->query($sql, $_POST['user_id']);

			$sql = "UPDATE addresses SET address_line = ?, town = ?, lot_number = ?, region = ? WHERE address_id = ?;";
            $results = $database->query($sql, $address_line, $town, $lot_number, $region, $a_id[0]["address_id"]);



			if($results === false || $a_id === false)
			{
				apologize("Something went wrong.");				
			}
			$_SESSION['info_update_success'] = 1;			
			redirect("admin_users.php");
		}


    }

   


    
    $sql = "SELECT first_name, last_name, address_id, email, phone , username, user_id FROM users";
    $user_info = $database->query($sql);

    $position = [];

    
    foreach ($user_info as $user_info) {

    	$sql = "SELECT * FROM addresses WHERE address_id = ? LIMIT 1";

    	$address_info = $database->query($sql,$user_info['address_id']);

    	$position[]=[
    	"user_id"=> $user_info['user_id'],
    	"username"=> $user_info['username'],
	    "first_name" => $user_info['first_name'],
	    "last_name" => $user_info['last_name'],
	    "email" => $user_info['email'],
	    "phone" => $user_info['phone'],
	    "town" => $address_info[0]['town'],
	    "lot_number" => $address_info[0]['lot_number'],
	    "address_line" => $address_info[0]['address_line'],
	    "region" => $address_info[0]['region'],

	    ];
    	
    }
    


    if($user_info != [] || $address_info != [] )
    {
    	render("admin_users_t.php",["position" => $position]);
    }
    else
    {
    	apologize("Something went wrong loading user profile;");
    }

    
    

?>