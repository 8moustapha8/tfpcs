<?php
require('../../resources/config.php');
$theID = $_GET['id'];

$data = mysql_query("DELETE FROM products WHERE id = '$theID'") 
or die(mysql_error());

header("location:../index.php");
?>