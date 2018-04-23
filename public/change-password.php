<?php 
	
	require("../includes/config.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["current_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"]))
		{
			$current_password = $_POST["current_password"];
			$new_password = $_POST["new_password"];
			$confirm_password = $_POST["confirm_password"];
			$salt = "2a07usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi";

			$sql = "SELECT password FROM users WHERE user_id = ? LIMIT 1;";
			$rows = $database->query($sql, $_SESSION["id"]);
			
			$results = array("curr_password" => true, "password_match"=>true); //create an array to check if values are correct

			if($rows[0]['password'] == crypt($current_password, $salt)) //check to see if password in database and the one being entered is the same
			{
				if($new_password == $confirm_password) //check to see if confirm password matches new password
				{					
					$sql = "UPDATE users SET password = ? WHERE user_id = ?;"; //update the user's password
					$done = $database->query($sql, crypt($confirm_password,$salt), $_SESSION['id']);
					if($done === false)
					{
						apologize("Could not update password");
					}
					echo json_encode($results);
					exit;
				}
				else
				{
					$results["password_match"] = false;
				}
				
				$results["curr_password"] = true;
				echo json_encode($results);
				exit;
			}
			else
			{
				$results["curr_password"] = false;
				if($new_password != $confirm_password)
				{
					$results["password_match"] = false;
				}
				echo json_encode($results);
				exit;
			}
		}
	}

?>