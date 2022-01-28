<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$sql = "UPDATE owner SET ow_name = '$name', ow_email = '$email', ow_mob_number = '$mobno' WHERE ow_id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Owner updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating Owner';
		}
	}
	else{
		$_SESSION['error'] = 'Select Owner to edit first';
	}

	header('location: index.php');

?>