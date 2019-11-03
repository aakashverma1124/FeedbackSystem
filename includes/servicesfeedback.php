
<?php
	include_once("./../includes/connection.php");
	$service_id = $_POST['ServiceId'];
	$count_responses = [];
	$stmt = $conn->prepare("SELECT COUNT(*) FROM response_table where responses = ? and service_id = ?");
	for ($i=1; $i <=10 ; $i++) { 
		$stmt->execute([$i, $service_id]);	
		array_push($count_responses, $stmt->fetch()[0]);
	}
	echo json_encode($count_responses) ;
  	// foreach ($count_responses as $key => $value) {
  	// 	echo $value;
  	// }
  	

  	

?>
