<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM owner WHERE ow_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Owner deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting Owner';
		}
	}
	else{
		$_SESSION['error'] = 'Select Owner to delete first';
	}

	header('location: index.php');
?>