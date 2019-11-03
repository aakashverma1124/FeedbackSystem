<?php
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
	$stmt = $conn->prepare("INSERT INTO services (`service_name`, `type`) VALUES(?,?)");
	$status = $stmt->execute([$values['add_hostel_service'], 'hostel']); 
	if($status){
		echo "Hostel Service Added";
	}else{
		echo "Error Occured";
	}
	

	
	
?>
