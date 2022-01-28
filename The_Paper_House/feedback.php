<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "paperhouse";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
	$username = $_POST['name'];
	$email = $_POST['email'];
  $mobno = $_POST['phone'];
	$message = ($_POST['message']);
	

	// if ($password == $cpassword) {
	// 	$sql = "SELECT * FROM customer WHERE cust_email='$email'";
	// 	$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO feedback (cust_name, cust_mob_number, cust_email, feedback)
					VALUES ('$username', '$mobno', '$email','$message')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Thank You For Giving The Feedback!.')</script>";
				echo "<script>location.assign('http://localhost/thepaperhouse/userdashboard.php')</script>";
        exit();
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	// } else {
	// 	echo "<script>alert('Password Not Matched.')</script>";
	// }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-info">
          <h3 class="title" style="text-align: center;">THE PAPER HOUSE 🖨️</h3>
          <p class="text" style="color: #000;">
          Average players want to be left alone. Good players want to be coached. Great players want to be told the truth
          <br><span style="margin-left: 250px;"> -Doc Rivers</span>
          </p>

          <div class="info">
            <img src="img/feedback.svg" style="height: 380px; width: 350px;" alt="" />
          </div>

        </div>

        <div class="contact-form" >


          <form action="" method="post" autocomplete="off" style="margin-top: 50px;">
            <h3 class="title" style="text-align: center;">Feedback Form</h3>
            <div class="input-container">
              <input type="text" name="name" placeholder="Name" class="input" />
            </div>
            <div class="input-container">
              <input type="email" name="email" placeholder="Email" class="input" />
            </div>
            <div class="input-container">
              <input type="text"maxlength="10" name="phone" placeholder="Phone No." class="input" />
            </div>
            <div class="input-container textarea">
              <textarea name="message" placeholder="Feedback" class="input"></textarea>
            </div>
            <input type="submit" name="submit" class="btn" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
