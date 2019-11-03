<?php
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
	$stmt = $conn->prepare("SELECT * FROM student_table WHERE admin_email=?");
	session_start();
	$admin_email = $_SESSION['admin_email'];
	$stmt->execute([$admin_email]); 
	$result = $stmt->fetch();
	if($result){
		if($result['password']==$values['oldPassword'])
		{
			if($values['newPassword']==$values['confirmNewPassword'])
			{
				$stmt = $conn->prepare("UPDATE admin_table SET `admin_password` = ? WHERE admin_email=?");
				$status = $stmt->execute([$values['newPassword'], $admin_email]); 	
				echo "Password changed successfully!";
			}
			else
			{
				echo "New and Confirm passwords mismatch!";
			}
		}
		else
		{
			echo "Passwords mismatch!";
		}
	}
	else
	{
		echo "Oops! Some error occured!";
	}

	
	
?>