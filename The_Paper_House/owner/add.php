<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$password = $_POST['password'];
		$sql = "INSERT INTO owner (ow_name, ow_email, ow_mob_number, password) VALUES ('$name', '$email', '$mobno', '$password')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Owner added successfully';
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