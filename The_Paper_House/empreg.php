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
  $mobno = $_POST['mobno'];
	$address = ($_POST['address']);
	

	// if ($password == $cpassword) {
	// 	$sql = "SELECT * FROM customer WHERE cust_email='$email'";
	// 	$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO employee (e_name, e_email, e_mobno, e_address)
					VALUES ('$username', '$email', '$mobno','$address')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				echo "<script>location.assign('http://localhost/thepaperhouse/index.html')</script>";
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
    <title>Employee Registration</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-info">
          <h3 class="title" style="text-align: center;">THE PAPER HOUSE 🖨️</h3>
          <p class="text" style="color: #000;">
          Welcome...<br> You are responsible for delivering various items to different addresses as assigned.
          <br><span style="margin-left: 270px;"> -Nirvana</span>
          </p>

          <div class="info">
            <img src="img/signin.svg" style="height: 370px; width: 350px;" alt="" />
          </div>

        </div>

        <div class="contact-form" >
          <form action="" method="POST" autocomplete="off" style="margin-top: 90px;">
            <h3 class="title" style="text-align: center;">Sign Up</h3>
            <div class="input-container">
              <input type="text" name="name" placeholder="Name" class="input" value="<?php echo $name; ?>" required />
            </div>
            <div class="input-container">
              <input type="email" name="email" placeholder="Email" class="input" value="<?php echo $email; ?>" required/>
            </div>
            <div class="input-container">
              <input type="tel" name="mobno" placeholder="Phone No." class="input" value="<?php echo $mobno; ?>" required/>
            </div>
            <div class="input-container">
              <input type="text" name="address" placeholder="Address" class="input" value="<?php echo $address; ?>" required/>
            </div>
            <!-- <div class="input-container">
              <input type="password" name="cpassword" placeholder="Confirm password" class="input" value="<?php echo $cpassword; ?>" required/>
            </div><br> -->
       
   
            <input type="submit"  name="submit" class="btn btn-outline-success" style="border: 1px white solid;" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script>
    $(document).ready(function() {
     $("#verify_captcha").click(function(){
        var captcha_id = $("#captcha_id").val();
        var captchID = $("#captcha").text();
         if(captcha_id == captchID)
         { 
            $('#verify_captcha').html('<i class="fas fa-spinner fa-spin mr-4"></i>'); 
            setTimeout(
              function() 
                {    //disable 
                    $('#captcha_id').hide("slow"); // Input box will hide
                    $('#verify_captcha').addClass("btn btn-info disabled").text("Captcha Verified");
                    $('#verify_captcha').attr("disabled", true);
                }, 3000);
         }
         else
         {
            $('#verify_captcha').addClass("btn btn-danger").text("Not Matched");
            $("#captcha_id").prop('disabled', true);
            setTimeout(
              function() 
                {    //disable 
                    $('#captcha_id').val("");
                    $("#captcha_id").prop('disabled', false);
                    $('#verify_captcha').removeClass("btn-danger").text("Verify Captcha");
                }, 3000);
         }
      }); 
    });
</script> -->
