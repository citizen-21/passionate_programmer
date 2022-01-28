<!DOCTYPE html>
<html>
<head>
	<title>CURD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<table class="table table-striped content-table" style="margin-top: -1rem;">
				<thead>
					<tr>
                <th width="10%">Order Id</th>
                <th width="10%">Product Id</th>
                <th width="10%">Quantity</th>
                <th width="10%">size</th>
                <th width="10%">Type</th>
                <th width="10%">Variation</th>
                <th width="13%">filename</th>
                <th width="10%">Price</th>
					</tr>
				  </thead>
				  
				  
				  <h4>Employee Detail from Dept_NO - 1</h4><br>
				  <?php
						$conn = mysqli_connect("localhost", "root", "", "paperhouse");
						// Check connection
						if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT * FROM ordersdetail";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						echo "
						<tr>
						<td>" . $row["ordersid"]. "</td>
						<td>" . $row["productid"] . "</td>
						<td>" . $row["quantity"]. "</td>
						<td>" . $row["size"]. "</td>
						<td>" . $row["type"]. "</td>
                        <td>" . $row["variation"]. "</td>
						<td>" . $row["filename"]. "</td>
						<td>" . $row["price"]. "</td>

						</tr>";
						}
						echo "</table>";
						} else { echo "0 results"; }
						$conn->close();
						?>
			</table><br><br>
                    </body>
                    </html>