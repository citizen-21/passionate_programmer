<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM customer WHERE cust_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Customer deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting Customer';
		}
	}
	else{
		$_SESSION['error'] = 'Select Customer to delete first';
	}

	header('location: index.php');
?>