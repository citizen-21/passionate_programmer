<html lang="en">
<head>
    <meta charset="ISO-8859-1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Payment Detail</title>
    <style>

body{
		background: url(./bg.jpg);
		height: 100vh;
		-webkit-background-size: cover;
		background-size: cover;
		background-position: center center;
		position: relative;
	}

.header{
    color: black;
	text-align: center;
	margin-top: 5rem;
	margin-bottom: 5rem;
	font-size:40px
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 8px 8px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009be1;
  color: #fff;
  text-align: left;
  font-size: 18px;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #ccccff;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009be1;
}

.content-table tbody tr.active-row {
    font-size: 15px;
}

    </style>    
</head>
<body>


<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
?>
<div class="content-blog">
		<div class="container" ><br>
		<a href="../userdashboard.php"><span class="btn btn-success" style="background-color: #009be1;">My Dashboard</span></a>
<?php

if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo ' 
		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html>
		<h1>Transaction Success ! Your Order is Placed Successfully.</h1>
		<img src="./tick1.gif" width="80" height="80" style="margin-top: -7rem; margin-left: 93rem;" title="Logo of a company" alt="Logo of a company" />

		</html>
		';
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo"<br>";
		echo"<br>";
		echo "<h1>Transaction status is Failed</h1>" . "<br/>";
		echo"<br>";

	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		?>
		<br>
		<br>
		<table class="table table-striped content-table" style="margin-top:-1rem;">
		<thead>
		<tr>
			<th width="20%">Name</th>
			<th width="30%">Details</th>
		</tr>
	</thead>
		<tr>
		<?php
		foreach($_POST as $paramName => $paramValue) {
			echo "
						<tr>
						<td>" . $paramName . "</td>
						<td>" . $paramValue; "</td>
						</tr>";
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

</body>
</html>