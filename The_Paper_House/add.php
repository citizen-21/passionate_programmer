<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $order_id = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $del_boy = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $o_status = (!empty($_POST['email'])) ? $_POST['email'] : '';

    if (!empty($order_id)) {
        // update the record
        $stu_query = "UPDATE `order_manager` SET delivery_boy= '" . $del_boy . "', order_status='" . $o_status . "' WHERE paytm_order_id ='" . $order_id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "UPDATE `order_manager` SET delivery_boy= '" . $del_boy . "', order_status='" . $o_status . "' WHERE paytm_order_id ='" . $order_id . "'";
        $msg = "update";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/thepaperhouse/allorders.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `order_manager` WHERE paytm_order_id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $paytm_id = $results[1];
    $status = $results[7];
    $del_boy = $results[6];

} else {
    $paytm_id = "";
    $status = "";
    $del_boy = "";

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body{
		background: url(img/tablebg.jpg);
		height: 100vh;
		-webkit-background-size: cover;
		background-size: cover;
		background-position: center center;
	
    </style>
    </head>
<body>
<div class="container" >
			<div class="row" >
				<div class="col-sm-2">
				<img src="img/feedbacktable.png" style="height: 35rem; width: 40rem; margin-left: 33rem;" >
				</div>
			</div>
		</div>

        <div class="header" style="margin-top: 1rem;">
		<p style="color: #1abc9c;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
        margin-left: 57rem;
		">Update Details</p>
		</div>
    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
        <br><br>
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">Order_Id</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Order ID" value="<?php echo $paytm_id; ?>">
                </div>
            </div>


            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Delivery Boy</label>
                <div class="col-sm-7">
                <select value="<?php echo $del_boy; ?>" placeholder="select delivery boy" name="last_name" class="form-control" id="last_name" >
                <option value="<?php echo $del_boy; ?>" placeholder="select delivery boy"><?php echo $del_boy; ?></option>
                <?php
                    // include 'includes/db.php';  // Using database connection file here
                    $con=mysqli_connect("localhost","root","","paperhouse");
                    $records = mysqli_query($con, "SELECT e_name From employee");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                    {
                        echo "<option value='". $data['e_name'] ."'>" .$data['e_name'] ."</option>";  // displaying data in option menu
                    }	
                ?>  
                
                </select>    
                <?php mysqli_close($con);  // close connection ?>
            </div>
            </div>




            <!-- <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male" >Male</option>
                <option value="Female">Female</option>
                </select>
                </div>
            </div> -->
            <div class="form-group row">
                
                <label for="email" class="col-sm-3 col-form-label">Order Status</label>
                <div class="col-sm-7">
                <select name="email" class="form-control" id="email">
                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                <option value="Pending">Pending</option>
                <option value="In Progress" >In Progress</option>
                <option value="Out For Delivery">Out For Delivery</option>
                <option value="Completed">Completed</option>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>"><br><br>
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>