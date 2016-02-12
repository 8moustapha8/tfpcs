<?php
session_start();
$id = $_GET['id'];

$_SESSION[$id] = 1;

header("location:../index.php");
?>