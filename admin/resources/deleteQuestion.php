<?php
require('../../resources/config.php');
$theID = $_GET['id'];

$data = mysql_query("DELETE FROM questions WHERE id = '$theID'") 
or die(mysql_error());

header("location:../manage_questions.php");
?>