<?php
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
	$stmt = $conn->prepare("INSERT INTO services (`service_name`, `type`) VALUES(?,?)");
	$status = $stmt->execute([$values['add_campus_service'], 'campus']); 
	if($status){
		echo "Campus Service Added";
	}else{
		echo "Error Occured";
	}

?>
