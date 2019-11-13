<?php

	session_start();
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
	$stmt = $conn->prepare("SELECT * FROM student_table WHERE admission_number=?");
	$admission_number = $_SESSION['admission_number'];
	$stmt->execute([$admission_number]); 
	$result = $stmt->fetch();
	if($result){
		if($result['password']==$values['oldPassword'])
		{
			if($values['newPassword']==$values['confirmNewPassword'])
			{
				$stmt = $conn->prepare("UPDATE student_table SET `password` = ? WHERE admission_number=?");
				$status = $stmt->execute([$values['newPassword'], $admission_number]); 	
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