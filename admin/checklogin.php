<?php

require('../resources/config.php');
$tbl_name="users"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$database")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 
$encrypted_mypassword=md5($mypassword);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username ='$myusername' and password='$encrypted_mypassword'";
$result=mysql_query($sql);

//Get user id
$data = mysql_query("SELECT * FROM $tbl_name WHERE username ='$myusername' and password='$encrypted_mypassword'") 
or die(mysql_error());

while($row = mysql_fetch_array( $data )) 
{
		$userID = $row['id'];
}

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("myusername");
session_start();
$_SESSION['myusername'];
$_SESSION['mypassword'];
$_SESSION['myusername']=$userID;

$date = date("Y-m-d");

header("location:index.php");
}
else {
header("location:login.php?error=1");
}
?>