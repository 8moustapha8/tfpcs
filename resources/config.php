
<?php

//Connects to the Database
$host = 'localhost';
$username = 'root';
$password = 'Dodgeviper64';
$database = 'pershore'; 
$siteTitle = 'Gregs';
$siteLogo = './img/logo.png'; //Don't put ./ in the path.

mysql_connect($host, $username, $password) or die(mysql_error()); 
mysql_select_db($database) or die(mysql_error()); 

?>
	