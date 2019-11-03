<?php
	include_once('./includes/connection.php');

	$name;
	function test_input($data) {
 	 	$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$admission_number = test_input($_POST["admission_number"]);
	  		$user_password = test_input($_POST["user_password"]);
	  		$stmt = $conn->query("SELECT * FROM student_table");
			$users = $stmt->fetchAll();
			var_dump($users);
			foreach ($users as $user){
				if($user["admission_number"]==$admission_number && $user["password"]==$user_password){
					session_start();
					$_SESSION["name"] = $user["name"];
					$_SESSION["email"] = $user["email"];
					$_SESSION["branch"] = $user["branch"];
					$_SESSION["contact"] = $user["contact"];
					$_SESSION["admission_number"] = $user["admission_number"];
					header("Location: userdashboard.php");
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