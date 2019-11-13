<?php

	session_start();
	ob_start();
	include_once('./includes/connection.php');

	$name;
	function test_input($data) {
 	 	$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;

	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$admin_email = test_input($_POST["admin_email"]);
			$admin_password = test_input($_POST["admin_password"]);
			$stmt = $conn->query("SELECT * FROM admin_table");
			$users = $stmt->fetchAll();
			var_dump($users);

			foreach ($users as $user){
				if($user["admin_email"]==$admin_email && $user["admin_password"]==$admin_password){
					$_SESSION["admin_name"] = $user["admin_name"];
					$_SESSION["admin_email"] = $user["admin_email"];
					$_SESSION["admin_contact"] = $user["admin_contact"];
					$_SESSION["admin_designation"] = $user["admin_designation"];
					$_SESSION["admin_loggedin"] = 1;
					header("Location: admindashboard.php");
					die();
					}
				}
			}
			else {
				echo "failed";
			}

    

	// If login fails
	header("Location: index.php?status=failed");
	die();

?>