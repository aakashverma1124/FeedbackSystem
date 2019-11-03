<?php
	session_start();
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
	$service_id = $_POST['service_id'];
	$comment_response = $_POST['comment_response'];
	$admission_number = $_SESSION['admission_number'];
	// echo $service_id;
	$count = 1;
	foreach ($values as $key => $value) {
		// echo 'Service id'.$service_id.'Question no'.$key.'Response'.$value;
		$stmt = $conn->prepare("INSERT INTO response_table(service_id, ques_no, responses, admission_number) VALUES (?,?,?,?)");
		$status1 = $stmt->execute([$service_id, $key, $value, $admission_number]); 	
		$count++;
	}

	$stmt2 = $conn->prepare("INSERT INTO comment_response_table(service_id, ques_no, responses, admission_number) VALUES (?,?,?,?)");
	$status2 = $stmt2->execute([$service_id, $count, $comment_response, $admission_number]); 	

	if($status1 && $status2 ) {
		include_once('./includes/thankyouscreen.php');
	}
	else {
		echo 'There was something wrong. Please fill the feedback again.';
	}


?>