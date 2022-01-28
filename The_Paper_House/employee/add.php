<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$address = $_POST['address'];
		$sql = "INSERT INTO employee (e_name, e_email, e_mobno, e_address) VALUES ('$name', '$email', '$mobno', '$address')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding Employee';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>