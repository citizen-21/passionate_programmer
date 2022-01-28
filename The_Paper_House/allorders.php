<?php
ini_set('display_errors','Off');

$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
} else {
    $alert_msg = "";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>All Orders</title>
    <style>

body{
		/* background: url(img/tablebg.jpg); */
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
  background-color: #1abc9c;
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
  border-bottom: 2px solid #1abc9c;
}

.content-table tbody tr.active-row {
    font-size: 15px;
}

    </style>
</head>
<body>

<div class="container" >
			<div class="row" >
				<div class="col-sm-2">
				<img src="img/feedbacktable.png" style="height: 20rem; width: 25rem; margin-left: 29rem;" >
				</div>
			</div>
		</div>

        <div class="header" style="margin-top: 1rem;">
		<span style="color: #1abc9c;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		">Customer Orders</span>
        <a href="./ownerdashboard.php" ><span style="font-size: 20px; margin-left: 73rem; background-color: #1ABC9C;" class="btn btn-success">owner's Dashboard</span></a>
		</div>
        <?php if (!empty($alert_msg)) {?>
        <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
<br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
   <table class="table content-table" style="margin-top: -3rem;">
  
      <?php



        $con=mysqli_connect("localhost","root","","paperhouse");
        $query="SELECT * FROM `order_manager`";
        $user_result=mysqli_query($con,$query);
        while($user_fetch=mysqli_fetch_assoc($user_result))
        {
            if($user_fetch[order_status] == "Pending" || $user_fetch[order_status] == "In Progress" || $user_fetch[order_status] == "Out For Delivery")
            {
            echo"
            <thead>
                <tr>
                <th>Order Id</th>
                <th>Paytm Order Id</th>
                <th>Cust Id</th>
                <th>Delivery Address</th>
                <th>Order Details...</th>
                <th>Delivery Boy</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
                <tr>
                    <td>$user_fetch[Order_Id]</th>
                    <td>$user_fetch[paytm_order_id]</td>
                    <td>$user_fetch[cust_id]</td>
                    <td>$user_fetch[del_address]</td>
                    <td>
                    <table class='table content-table'>
                        <thead>
                            <tr>
                            <th>Service</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>Variation</th>
                            <th>File</th>
                            </tr>
                        </thead>";
                    $order_query="SELECT * FROM `orderdetail` WHERE `Order_Id`='$user_fetch[Order_Id]'";
                    $order_result=mysqli_query($con,$order_query);
                    while($order_fetch=mysqli_fetch_assoc($order_result))
                    {
                        echo"
                        <tr>
                            <td>$order_fetch[s_name]</td>
                            <td>$order_fetch[quantity]</td>
                            <td>$order_fetch[size]</td>
                            <td>$order_fetch[type]</td>
                            <td>$order_fetch[variation]</td>
                            <td>"
                            ?><a href="uploads/<?php echo $order_fetch[file]; ?>" download="<?php echo $order_fetch[file]; ?>"><?php echo $order_fetch['file']; ?></a></td>
                        </tr>
                        <?php
                    }
                    echo"
                    </table>
                    </td>
                    <td>$user_fetch[delivery_boy]</td>
                    <td>$user_fetch[order_status]</td>" 
                    ?>
                    <td><?php if($user_fetch[del_address] = "") 
                    {
                        ?><button disabled><a href="/thepaperhouse/add.php?id=<?php echo $user_fetch[paytm_order_id]; ?>" class="btn btn-primary">EDIT</a></button></td>
                    <?php } 
                    else 
                    { ?>
                         <a href="/thepaperhouse/add.php?id=<?php echo $user_fetch[paytm_order_id]; ?>" class="btn btn-primary" >EDIT</a></td>
                    <?php } ?>  
                </tr>    
            <?php ;
                }
        }
      ?>
</table>
            </div>
        </div>
    </div>
</body>
</html>