<?php
	
	session_start();
	include_once('./includes/class.upload.php');
	include_once('./includes/connection.php');
	// $values = (array)json_decode($_POST['action']);
	
if(isset($_SESSION['admin_loggedin'])) {

	$handle = new upload($_FILES['uploadedServicePhoto']);

	$stmt = $conn->prepare("INSERT INTO services (`service_name`, `type`) VALUES(?,?)");
	$status = $stmt->execute([$_POST['add_campus_service'], 'campus']); 


	$stmt2 = $conn->query("SELECT * FROM services ORDER BY service_id DESC LIMIT 1");
	$status2 = $stmt2->execute(); 

	$serviceId = $stmt2->fetch();

	$service_id = intval($serviceId['service_id']);

	$file_name = $service_id;


	$message = '';

	if ($handle->uploaded) {
	  $handle->file_new_name_body   = ''.$file_name.'';
	  $handle->image_resize         = true;
	  $handle->image_x              = 450;
	  $handle->image_y              = 280;
	  $handle->image_convert        = 'jpg';
	  $handle->allowed 				= array('image/*');
	  $handle->mime_check 			= true;
	  $handle->dir_chmod 			= 0777;
	  $handle->file_overwrite = true;
	  $handle->process(realpath(dirname(__FILE__)).'/images/services/campus/');
	  if ($handle->processed) {
	    $message = $message.'Photo Saved'.'\n';
	    $handle->clean();
	  } else {
	    $message = $message.'Error : ' . $handle->error.'\n';
	  }
	}else{
		$message = $message."Photo upload failed".'\n';
	}

	echo $message;

	if($status){
		echo "Campus Service Added";
	}else{
		echo "Error Occured";
	}

}

else {
	echo "You're not an authentic user!";
}

?>
