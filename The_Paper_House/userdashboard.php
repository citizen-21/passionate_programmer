  <?php 

session_start();

if (!isset($_SESSION['name'])) {
    header("Location: userlogin.php");
}

if (!isset($_SESSION['id'])) {
  header("Location: userlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Dashboard</title>
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
          <li><a href="./Cart.php"><i class="fas fa-blog"></i>Services</a></li>
          <li><a href="./viewstatus.php"><i class="fas fa-map-pin"></i>View Status</a></li>
          <li><a href="./feedback.php"><i class="fas fa-address-card"></i>Post Feedback</a></li>
          <li><a href="./myorder.php"><i class="fas fa-project-diagram"></i>My History</a></li>
          <li><a href="./contactowner.php"><i class="fas fa-address-book"></i>Contact Details</a></li>
            <!-- <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Profile</a></li> -->
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Welcome <span style="color: black;" > <?php echo "<span> " . $_SESSION['name'] . "</span>"; ?></span> !! Have a Nice Day.<?php echo "<span> " . $_SESSION['id'] . "</span>"; ?><a href="./userlogout.php" ><span style="margin-left: 90rem; color: crimson; border: 1px solid red;" class="btn btn-outline-danger">Logout</span></a></div>  
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <img src="img/user.gif" style="margin-left: 14rem; max-width: 190vh" alt="">
            </div>
          </div>
      </div>
    </div>
</div>

</body>
</html>