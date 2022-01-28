<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage User</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
body{
		background: url(img/tableback.jpg);
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
<div class="container">
<div class="container" >
			<div class="row" >
				<div class="col-sm-2">
				<img src="img/manageowner.png" style="height: 40rem; width: 50rem; margin-left: 30rem;" >
				</div>
			</div>
		</div>

        <div class="header" style="margin-top: 1rem;">
		<p style="color: #1abc9c;
		font-family: Georgia, serif;
		font-size: 40px;
		font-weight: bold;
		">Manage Customer</p>
		</div>

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-info" style="margin-left: 1.5rem;"><span class="glyphicon glyphicon-plus" ></span> Add New Customer</a>
				<a href="../admindashboard.php"><span class="btn btn-success" style="background-color: #1ABC9C; margin-left: 44rem;">Admin Dashboard</span></a>
			</div>
			<div class="row">
				<div class="col-lg-12">
				<table id="mytable" class="table table-striped content-table" >
					<thead>
						<th width="8%">ID</th>
						<th width="15%">Firstname</th>
						<th width="15%">Email</th>
						<th width="15%">Mobile No.</th>
						<th width="15%">Action</th>
					</thead>
					<tbody>
						<?php
							include_once('connection.php');
							$sql = "SELECT * FROM customer";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['cust_id']."</td>
									<td>".$row['cust_name']."</td>
									<td>".$row['cust_email']."</td>
									<td>".$row['cust_mob_number']."</td>
									<td>
										<a href='#edit_".$row['cust_id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['cust_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
						?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>
<style>
.PP{
	text-align: center;
}
</style>
</html>