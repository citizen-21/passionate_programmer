<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Transaction status query</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
<div class="header" style="margin-top: 1rem;">
		<p style="color: #009be1;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		">Get Transaction Status<a href="../ownerdashboard.php" ><span style="font-size: 20px; margin-left: 45rem; background-color: #009be1;" class="btn btn-success">Owner Dashboard</span></a></p>
		
		</div>
	<form method="post" action="">
	<div class="content-blog"  >
		<div class="container" >
			<table class="table table-striped content-table" style="margin-top: -1rem; margin-left: 1rem;">
			<tbody>	
			<thead>
					<tr>
					  <th>Name</th>
					  <th>Enter Order Id</th>
					</tr>
				  </thead>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input value="Submit ID" class="btn btn-success" style="background-color: #009be1 " type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		<br/></br/>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
		<div class="header" style="margin-top: 1rem;">
		<p style="color: #009be1;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		margin-left: -73rem;
		">Response of Status</p>
		</div>
		<div class="content-blog"  >
		<div class="container" >
			<table class="table table-striped content-table" style="margin-top: -1rem;">
			<tbody>
			<thead>
					<tr>
					  <th width="20%">Name</th>
					  <th>Details</th>
					</tr>
				  </thead>
				<?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
				<tr >
					<td style="border: 1px solid"><label><?php echo $paramName?></label></td>
					<td style="border: 1px solid"><?php echo $paramValue?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<?php
		}
		?>
	</form>
</body>
</html>