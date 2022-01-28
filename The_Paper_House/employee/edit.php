<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$address = $_POST['address'];
		$sql = "UPDATE employee SET e_name = '$name', e_email = '$email', e_mobno = '$mobno', e_address = '$address' WHERE e_id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating Employee';
		}
	}
	else{
		$_SESSION['error'] = 'Select Employee to edit first';
	}

	header('location: index.php');

?>