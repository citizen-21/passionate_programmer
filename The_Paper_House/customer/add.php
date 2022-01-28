<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$password = $_POST['password'];
		$sql = "INSERT INTO customer (cust_name, cust_email, cust_mob_number, password) VALUES ('$name', '$email', '$mobno', '$password')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Customer added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>