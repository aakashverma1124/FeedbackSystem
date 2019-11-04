<?php
	include_once('./includes/connection.php');

	$values = (array)json_decode($_POST['action']);
	$service_id = $values['ServiceId'];
    $service_id = intval($service_id);
	$stmt = $conn->prepare("INSERT INTO question_table VALUES((select count(*) from (select * from question_table where service_id = ?) as temp)+1, ?,?)");
	$status = $stmt->execute([$service_id, $values['new_question'], $service_id]); 
	if($status){
		echo "Question Added";
	}else{
		echo "Error Occured";
	}
?>
