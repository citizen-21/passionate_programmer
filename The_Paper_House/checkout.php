<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'paperhouse');

// Save new order
mysqli_query($con, 'insert into orders(name, datecreation, status, username)values("New Order", "'.date('Y-m-d').'", "Pending", "acc2")');
$ordersid = mysqli_insert_id($con);

// Save order details for new order
foreach ($_SESSION["cart"] as $keys => $value) {
	mysqli_query($con, 'insert into ordersdetail(productid, ordersid, quantity, size, type, variation, filename, price)values('.$value["product_id"].', '.$ordersid.', '.$value["item_quantity"].', '.$value["item_size"].', '.$value["item_type"].', '.$value["item_variation"].', '.$value["item_file"].', '.$value["product_price"].')');
	echo '<script type ="text/JavaScript">';  
	echo 'alert("Order Placed Successfully")';  
	echo '</script>';  
}

// Clear all products in cart
unset($_SESSION['cart']);

?>