<?php
session_start();
require('../../resources/config.php');
// escape variables for security
$body = mysqli_real_escape_string($con, $body);

$title = $_GET['questionName'];

//get the last question id.
$data = mysql_query("SELECT * FROM questions ORDER BY id DESC LIMIT 1") 
or die(mysql_error());

while($row = mysql_fetch_array( $data ))
{
	$x = $row['id'];
}

//Assign the new $id.

$newID = $x + 1;


$sql=mysql_query("INSERT INTO questions (id,title,enabled) VALUES ('$newID','$title','1')")
or die(mysql_error());

header("location:../manage_questions.php");
		
?>