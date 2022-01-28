<?php
 
$conn = mysqli_connect("localhost", "root","","images");

// Getting uploaded file
$file = $_FILES["file"];
 
// Uploading in "uplaods" folder
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

   if (mysqli_query($conn, "INSERT into images (file_name) VALUES('".$file["name"]."')")) {
   echo '<p align="center"> Image name successfully saved into MySQL db.</p>';
   }
   else {
   echo '<p align="center"> Sorry, Please try again.</p>';
   }
 
// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);