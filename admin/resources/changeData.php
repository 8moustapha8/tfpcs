<?php

require('../../resources/config.php');
//Change the product data.

//Get the question number and the product ID
$theID = $_GET['id'];
$qID = $_GET['q'];
$question = 'q' . $qID;
$checked = $_GET['checked'];
$anchor = $_GET['anchor'];

if($checked == "checked")
{
	$request = 0;
}else{
	$request = 1;
}

$data2 = mysql_query("UPDATE products SET $question='$request' WHERE id = '$theID'") 
or die(mysql_error());

header("location:../index.php");

?>
