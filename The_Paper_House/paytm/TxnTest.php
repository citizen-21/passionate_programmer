<?php 

session_start();

if (!isset($_SESSION['id'])) {
  header("Location: index.html");
}
if (!isset($_SESSION['name'])) {
    header("Location: index.html");
  }

?>

<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
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
<form method="POST" action="pgRedirect.php">
	<div class="content-blog"  >
		<div class="container" >

					<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off" class="form-control"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
					<input type="hidden" id="CUST_ID" tabindex="2" class="form-control" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['id']; ?>" readonly>
				<input type="hidden" type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
				<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
					<input type="hidden" type="text" id="CUST_NAME" tabindex="4" class="form-control" maxlength="12" size="12" name="CUST_NAME"  value="<?php echo $_SESSION['name']; ?>" readonly>
					<input type="hidden" class="form-control" type="text" id="address" tabindex="4"  name="address" required>
				<input type="hidden" title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						id="TXN_AMOUNT"
						class="form-control"
						value=
						<?php 
						echo $_SESSION['total'];
						?>
						readonly>
						<?php
				if (isset($_POST['confirm'])) {
							?>
							<div class="container" >
			<div class="row" >
				<div class="col-lg-2">
				<img src="./paytm.svg" style="height: 28rem; width: 28rem; margin-left: 37rem;" >
				</div>
			</div>
		</div>

	<br><div class="header" style="margin-top: -1rem;">
		<p style="color: #009be1;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		margin-left: -10rem;
		">Proceed to Payment</p>
		</div>

		<div class="content-blog"  >
		<div class="container" >
            <form method="post" action="">
            <table class="table table-striped content-table" style="margin-top:-2rem;">
				<thead>
            <tr>
                <th width="20%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="10%">Size</th>
                <th width="10%">Type</th>
                <th width="10%">Variation</th>
                <th width="10%">File Name</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
			            </tr>
						</thead>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $value) {
                        ?>
                        <tr>
                        <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td><?php echo $value["item_size"]; ?></td>
                            <td><?php if($value["item_type"] == "") { echo "-";} ?><?php echo $value["item_type"]; ?></td>
                            <td><?php if($value["item_variation"] == "") { echo "-";} ?><?php echo $value["item_variation"]; ?></td>
                            <td><?php echo $value["item_file"]; ?></td>
                            <td>₹ <?php echo $value["product_price"]; ?></td>
                            <td>
                                ₹ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
						  }
                        ?>
                        <tr>
                            <td colspan="7" align="right">Total</td>
                            <th align="right">₹ <?php echo number_format($total, 2); ?>
						<?php
						if (isset($_POST['yes']) || isset($_POST['confirm'])) {
							 echo"+ 40.00";
							 $total = $total + 40;
						}
						$_SESSION['total'] = $total;
						?>
						</th>
                        </tr>
                        <?php
                    }
                    
                ?>
            </table>
            </form><br>
        </div>
	
				<tr>
					<td>	<button style="background-color: #009be1;" class="btn btn-block btn-success">Proceed to Payment</button>
					</td>
				</tr><br><br><br><br><br><br><br><br>
							<?php
						}
				?>
	</form>

	<br><div class="header" style="margin-top: -1rem;">
		<p style="color: #009be1;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		margin-left: -10rem;
		">Customer Cart Detail</p>
		</div>

		<form method="POST">
			<lable style="font-size: 2rem; margin-left: 2rem;" >Want Home Delivery ? </lable>
			<button name="yes" id="yes" class="btn btn-success">Yes</button>
			<button name="no" id="no" class="btn btn-danger">No</button>
		</form>


		<div class="content-blog"  >
		<div class="container" >
            <form method="post" action="">
            <table class="table table-striped content-table">
				<thead>
            <tr>
                <th width="20%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="10%">Size</th>
                <th width="10%">Type</th>
                <th width="10%">Variation</th>
                <th width="10%">File Name</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
			            </tr>
						</thead>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $value) {
                        ?>
                        <tr>
                        <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td><?php echo $value["item_size"]; ?></td>
                            <td><?php if($value["item_type"] == "") { echo "-";} ?><?php echo $value["item_type"]; ?></td>
                            <td><?php if($value["item_variation"] == "") { echo "-";} ?><?php echo $value["item_variation"]; ?></td>
                            <td><?php echo $value["item_file"]; ?></td>
                            <td>₹ <?php echo $value["product_price"]; ?></td>
                            <td>
                                ₹ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
						  }
                        ?>
                        <tr>
                            <td colspan="7" align="right">Total</td>
                            <th align="right">₹ <?php echo number_format($total, 2); ?>
						<?php
						if (isset($_POST['yes']) || isset($_POST['confirm'])) {
							 echo"+ 40.00";
							 $total = $total + 40;
						}
						$_SESSION['total'] = $total;
						?>
						</th>
                        </tr>
                        <?php
                    }
                    
                ?>
            </table>
            </form><br><br>
        </div>

        <div class="header" style="margin-top: -1rem;">
		<p style="color: #009be1;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		margin-left: -10rem;
		">Customer Payment Detail</p>
		</div>

	<form method="POST" action="">
	<div class="content-blog"  >
		<div class="container" >
			<table class="table table-striped content-table" style=" margin-top: -2rem;">
			<tbody>
			<thead>
				<tr>
					<th>Label</th>
					<th>Value</th>
				</tr>
</thead>
				<tr>
					<td><label>ORDER_ID *</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off" class="form-control"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
					</td>
				</tr>
				<tr>
					<td><label>CUST_ID *</label></td>
					<td><input id="CUST_ID" tabindex="2" class="form-control" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['id']; ?>" readonly></td>
				</tr>
				<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
				<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
				<tr>
					<td><label>Customer Name *</label></td>
					<td><input type="text" id="CUST_NAME" tabindex="4" class="form-control" maxlength="12" size="12" name="CUST_NAME"  value="<?php echo $_SESSION['name']; ?>" readonly>
					</td>
				</tr>
				<?php
				if (isset($_POST['yes']) ) {
							?>
				<tr>
					<td><label>Delivery Address *</label></td>
					<td><input class="form-control" type="text" id="address" tabindex="4"  name="address" required>
					</td>
				</tr>
							<?php
						}
				?>
				<tr>
					<td><label>Total Amount *</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						id="TXN_AMOUNT"
						class="form-control"
						value=
						<?php 
						echo $_SESSION['total'];
						?>
						readonly>
					</td>
				</tr>
				<tr>
				<input type="hidden" class="form-control" value="Pending" type="text" id="order_status" tabindex="4"  name="order_status">

					<td></td>
					<td><button name="confirm" id="confirm" style="background-color: #009be1;" class="btn btn-success">Confirm Your Order</button></td>

					
				</tr>
			</tbody>
		</table>
		<br>
	</form>

</body>
<?php

$con=mysqli_connect("localhost","root","","paperhouse");

if(mysqli_connect_error()){
	echo"<script>
	alert('not able to connect to database');
	</script>";
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
if (isset($_POST['confirm'])) 
{
	$query1="INSERT INTO `order_manager`(`paytm_order_id`, `cust_id`, `cust_name`, `del_address`, `amount`, `order_status`) VALUES ('$_POST[ORDER_ID]','$_POST[CUST_ID]','$_POST[CUST_NAME]','$_POST[address]','$_POST[TXN_AMOUNT]','$_POST[order_status]')";
	if(mysqli_query($con, $query1)) 
	{
		$Order_Id=mysqli_insert_id($con);
		$query2="INSERT INTO `orderdetail`(`Order_Id`, `s_name`, `quantity`, `size`, `type`, `variation`, `file`) VALUES (?,?,?,?,?,?,?)";
		$stmt=mysqli_prepare($con,$query2);
		if($stmt)
		{
			mysqli_stmt_bind_param($stmt,"sssssss",$Order_Id,$Item_Name,$Quantity,$Size,$Type,$Variation,$File);
			foreach ($_SESSION["cart"] as $keys => $value) {				
				$Item_Name=$value["item_name"];
				$Quantity=$value["item_quantity"];
				$Size=$value["item_size"];
				$Type=$value["item_type"];
				$Variation=$value["item_variation"];
				$File=$value["item_file"];
				mysqli_stmt_execute($stmt);
			}
			unset($_SESSION['cart']);
		}
	}
}
}
?>
</html>