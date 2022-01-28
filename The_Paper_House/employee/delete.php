<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM employee WHERE e_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting Employee';
		}
	}
	else{
		$_SESSION['error'] = 'Select Employee to delete first';
	}

	header('location: index.php');
?>