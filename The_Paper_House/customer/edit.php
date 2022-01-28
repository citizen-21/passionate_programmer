<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$sql = "UPDATE customer SET cust_name = '$name', cust_email = '$email', cust_mob_number = '$mobno' WHERE cust_id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Customer updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating Customer';
		}
	}
	else{
		$_SESSION['error'] = 'Select Customer to edit first';
	}

	header('location: index.php');

?>