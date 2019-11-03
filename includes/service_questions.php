<link rel="stylesheet" type="text/css" href="./assests/css/service_questions.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	include_once("./../includes/connection.php");
	$service_id = $_POST['ServiceId'];

	$stmt = $conn->prepare("SELECT * FROM question_table where service_id = ?");
  	$stmt->execute([$service_id]);
  	$questions = $stmt->fetchAll();
	$count = 1;
	echo '<div style="margin-top:2%;">
			<a style="color:brown;float:right;margin-bottom:2%;" href="./userdashboard.php">Back to Home</a></br>
			<h3 style="color:brown;">Your feedback is valuable to us.</h3><br>
			<form id="feedback-form" name="feedback-form" onsubmit="responseFormSubmit(event)">
				<input type="hidden" name="service_id" value='.$service_id.'>
			';

  	foreach($questions as $question) {
  		
  			echo '
	  			<div>
		  		<h4>'.$count.'. '.$question['question'].'</h4>
		  		</div><br>
	  			<div class="slidecontainer">
	  			 <div style="float: left">😡</div><div style="float: right">😍</div>

				  <input type="range" min="0" max="10" value="5" class="slider" step=".1" name="'.$question['ques_no'].'" id="myRange">

				</div>
			<hr>';
		$count++;
  	}

  	echo '
			<div class="form-group">
				<h4>Any other suggestion you would like to mention? Comment:</h4>
				<textarea name="comment_response" class="form-control" rows="5" id="comment"></textarea>
			</div>
			<br>
			<input type="submit" id="submit_feedback" name="submit_feedback" class="btn btn-danger submit_feedback" onclick="onSubmitFeedbackButtonClicked()" value="Submit Feedback"></br></br>
			</form>
		</div>';

?>
