<?php 

session_start();

if (!isset($_SESSION['name'])) {
    header("Location: adminlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/dashboard.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2 style="margin-top: -6px;" >The Paper House</h2>
        <ul>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
		  <li><a href="./customer/index.php"><i class="fas fa-user"></i>Manage Customer</a></li>
      <li><a href="./employee/index.php"><i class="fas fa-user"></i>Manage Employee</a></li>
          <li><a href="./owner/index.php"><i class="fas fa-user"></i>Manage Owner</a></li>
          <li><a href="./viewallorders.php"><i class="fas fa-project-diagram"></i>View Orders History</a></li>
          <li><a href="./feedbacktable.php"><i class="fas fa-address-card"></i>View Feedbacks</a></li>         
            <!-- <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Manage User</a></li>
            <li><a href="#"><i class="fas fa-address-book"></i>Contact</a></li> -->
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Welcome <span style="color: black;" ><?php echo "<span> " . $_SESSION['name'] . "</span>"; ?></span> !! Have a Nice Day.<a href="./adminlogout.php" ><span style="margin-left: 90rem; color: crimson; border: 1px solid red;" class="btn btn-outline-danger">Logout</span></a></div>  
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
                            <img src="img/admin.gif" style="margin-left: 20rem; margin-top:1rem; height: 60rem;" alt="">
            </div>
          </div>
      </div>
    </div>
</div>

</body>
</html>