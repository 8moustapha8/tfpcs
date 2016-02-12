<?php
require('../../resources/config.php');
//Change the product data.

//Get the question number and the product ID
$description = $_GET['productDesc'];
$image = $_GET['productImg'];
$title = $_GET['productTitle'];
$theID = $_GET['id'];
$link = $_GET['productLink'];

$data2 = mysql_query("UPDATE products SET title='$title', description='$description', img='$image', link='$link' WHERE id = '$theID'") 
or die(mysql_error());

header("location:../index.php");
?>
