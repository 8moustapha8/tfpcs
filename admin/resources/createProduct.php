<?php
session_start();
require('../../resources/config.php');
// escape variables for security
$body = mysqli_real_escape_string($con, $body);

$title = $_GET['productName'];
$date = $date = date("Y-m-d");
$author = $_SESSION['myusername'];


$sql=mysql_query("INSERT INTO products (title,date,author) VALUES ('$title', '$date', '$author')")
		or die(mysql_error()); 

header("location:../add_product.php");
		
?>