<?php 

session_start();

if (!isset($_SESSION['name'])) {
    header("Location: ownerlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Owner Dashboard</title>
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
          <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
          <li><a href="./allorders.php"><i class="fas fa-map-pin"></i>Manage Requests</a></li>
          <li><a href="./viewallorders.php"><i class="fas fa-project-diagram"></i>View Orders History</a></li>         
		 <li><a href="./feedbacktable.php"><i class="fas fa-address-card"></i>View Feedbacks</a></li>
       <!-- <li><a href="./paytm/TxnStatus.php"><i class="fas fa-address-book"></i>Get Order Detail</a></li>                      
		  <li><a href="#"><i class="fas fa-blog"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Profile</a></li> -->
            <li><a href="https://app.drift.com/conversations"><i class="fas fa-address-book"></i>Live Chat Dashboard</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Welcome <span style="color: black;" ><?php echo "<span> " . $_SESSION['name'] . "</span>"; ?></span> !! Have a Nice Day.<a href="./ownerlogout.php" ><span style="margin-left: 90rem; color: crimson; border: 1px solid red;" class="btn btn-outline-danger">Logout</span></a></div>  
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <img src="img/owner.svg" style="height: 45rem; margin-top: 7rem; margin-left: 25rem;">
            </div>
          </div>
      </div>
    </div>
</div>

</body>
</html>