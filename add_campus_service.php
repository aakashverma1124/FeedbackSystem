<?php
	include_once('./includes/class.upload.php');
	include_once('./includes/connection.php');
	// $values = (array)json_decode($_POST['action']);
	
	$handle = new upload($_FILES['uploadedServicePhoto']);

	$stmt = $conn->prepare("INSERT INTO services (`service_name`, `type`) VALUES(?,?)");
	$status = $stmt->execute([$_POST['add_campus_service'], 'campus']); 


	$message = '';

	if ($handle->uploaded) {
	  $handle->file_new_name_body   = ''.$_POST['add_campus_service'].'';
	  $handle->image_resize         = true;
	  $handle->image_x              = 400;
	  $handle->image_y              = 400;
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

	if($status){
		echo "Hostel Service Added";
	}else{
		echo "Error Occured";
	}

	echo $message;

	if($status){
		echo "Campus Service Added";
	}else{
		echo "Error Occured";
	}

?>
