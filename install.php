<?php
//The installation script
if(isset($_POST['submit'])){
	//Define the POST varibles
	$databaseName = $_POST['databaseName'];
	$mysqlUsername = $_POST['mysqlUsername'];
	$mysqlPassword = $_POST['mysqlPassword'];
	$databaseHost = $_POST['databaseHost'];
	
	$companyName = $_POST['companyName'];
	$companyLogo = $_POST['logoLocation'];
	$adminUsername = $_POST['adminUsername'];
	$adminPassword = $_POST['adminPassword'];
	
	//Write the file
	$myfile = fopen("./resources/config.php", "w") or die("Unable to open file!");
	$txt = "
<?php

//Connects to the Database
\$host = '".$databaseHost."';
\$username = '".$mysqlUsername."';
\$password = '".$mysqlPassword."';
\$database = '".$databaseName."'; 
\$siteTitle = '".$companyName."';
\$siteLogo = '".$companyLogo."'; //Don't put ./ in the path.

mysql_connect(\$host, \$username, \$password) or die(mysql_error()); 
mysql_select_db(\$database) or die(mysql_error()); 

?>
	";
	fwrite($myfile, $txt);
	fclose($myfile);
	
//Create SQL tables
mysql_connect($databaseHost, $mysqlUsername, $mysqlPassword) or die(mysql_error()); 
mysql_select_db($databaseName) or die(mysql_error());

$productTable = "CREATE TABLE `products` (
  `id` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`), 
  `title` text NOT NULL,
  `description` longtext,
  `img` longtext,
  `link` longtext,
  `date` date NOT NULL,
  `author` text NOT NULL,
  `q1` int(11) DEFAULT '0',
  `q2` int(11) DEFAULT '0',
  `q3` int(11) DEFAULT '0',
  `q4` int(11) DEFAULT '0',
  `q5` int(11) DEFAULT '0',
  `q6` int(11) DEFAULT '0',
  `q7` int(11) DEFAULT '0',
  `q8` int(11) DEFAULT '0',
  `q9` int(11) DEFAULT '0',
  `q10` int(11) DEFAULT '0',
  `q11` int(11) DEFAULT '0',
  `q12` int(11) DEFAULT '0',
  `q13` int(11) DEFAULT '0',
  `q14` int(11) DEFAULT '0',
  `q15` int(11) DEFAULT '0',
  `q16` int(11) DEFAULT '0',
  `q17` int(11) NOT NULL DEFAULT '0',
  `q18` int(11) NOT NULL DEFAULT '0',
  `q19` int(11) NOT NULL DEFAULT '0',
  `q20` int(11) NOT NULL DEFAULT '0',
  `q21` int(11) NOT NULL DEFAULT '0',
  `q22` int(11) NOT NULL DEFAULT '0',
  `q23` int(11) NOT NULL DEFAULT '0',
  `q24` int(11) NOT NULL DEFAULT '0',
  `q25` int(11) NOT NULL DEFAULT '0',
  `q26` int(11) NOT NULL DEFAULT '0',
  `q27` int(11) NOT NULL DEFAULT '0',
  `q28` int(11) NOT NULL DEFAULT '0',
  `q29` int(11) NOT NULL DEFAULT '0',
  `q30` int(11) NOT NULL DEFAULT '0',
  `q31` int(11) NOT NULL DEFAULT '0',
  `q32` int(11) NOT NULL DEFAULT '0',
  `q33` int(11) NOT NULL DEFAULT '0',
  `q34` int(11) NOT NULL DEFAULT '0',
  `q35` int(11) NOT NULL DEFAULT '0',
  `q36` int(11) NOT NULL DEFAULT '0',
  `q37` int(11) NOT NULL DEFAULT '0',
  `q38` int(11) NOT NULL DEFAULT '0',
  `q39` int(11) NOT NULL DEFAULT '0',
  `q40` int(11) NOT NULL DEFAULT '0',
  `q41` int(11) NOT NULL DEFAULT '0',
  `q42` int(11) NOT NULL DEFAULT '0',
  `q43` int(11) NOT NULL DEFAULT '0',
  `q44` int(11) NOT NULL DEFAULT '0',
  `q45` int(11) NOT NULL DEFAULT '0',
  `q46` int(11) NOT NULL DEFAULT '0',
  `q47` int(11) NOT NULL DEFAULT '0',
  `q48` int(11) NOT NULL DEFAULT '0',
  `q49` int(11) NOT NULL DEFAULT '0',
  `q50` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$data = mysql_query($productTable) 
or die(mysql_error());

$questionTable = "
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

$data = mysql_query($questionTable) 
or die(mysql_error());

$usersTable = "
CREATE TABLE `users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` TEXT NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

";

$data = mysql_query($usersTable) 
or die(mysql_error());

$date = date("Y-m-d");
$adminPassword = md5($adminPassword);

//Make the admin user
$data = mysql_query("INSERT INTO users (username,password) VALUES ('$adminUsername', '$adminPassword')") 
or die(mysql_error());

echo'<div style="background-color:white;outline:1px solid black"><p>Installation Complete! Make sure to delete this installation file. <a href="./admin/">Click here to go to the admin page.</a></p></div>';
	
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>tfpcs install</title>
		<style type="text/css">
		body
		{
			background-color:lightgrey;
			font-family:verdana,sans-serif;
			font-size:16px;
		}
		
		#container
		{
			background-color:white;
			outline:1px solid black;
			padding:10px;
			width:908px;
			margin:0 auto;
			display:block;
		}
		
		table
		{
			font-size:80%:
		}
		
		table tr
		{
			background-color:lightgrey;
		}
		
		table td
		{
			padding:10px;
		}
		
		.fancyText
		{
			padding:5px;
		}
		
		.fancyButton
		{
			position:relative;
			padding:6px 15px;
			border:2px solid #207cca;
			background-color:#207cca;
			color:#fafafa;
			margin-left:10px;
		}
		</style>
	</head>
	<body>
		<div id="container">
			<h1>Install TFPCS</h1>
			<p>Hey, thanks for choosing The Friendly Product Comparison Script! (tfpcs)</p>
			<p>Just enter the right details below to get it running on your server :)</p>
			<form action="install.php" method="POST">
			<table cellspacing="10">
				<tr>
					<td>Database name</td>
					<td><input class="fancyText" type="text" placeholder="db name" name="databaseName" required /></td>
					<td>The name of the database you want to run tfpcs on.</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input class="fancyText" type="text" placeholder="username" name="mysqlUsername" required /></td>
					<td>Your MySQL username.</td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="fancyText" type="text" placeholder="password" name="mysqlPassword" requird /></td>
					<td>Your MySQL password.</td>
				</tr>
				<tr>
					<td>Database host</td>
					<td><input class="fancyText" type="text" placeholder="database host" name="databaseHost" value="localhost" required /></td>
					<td>You should be able to get this from your webhost if localhost doesn't work.</td>
				</tr>				
			</table>
			<hr>
			<table cellspacing="10">
				<tr>
					<td>Company name</td>
					<td><input class="fancyText" type="text" placeholder="company name" name="companyName" required /></td>
					<td>This is to set the page titles and etc.</td>
				</tr>
				<tr>
					<td>Logo</td>
					<td><input class="fancyText" type="text" placeholder="company name" name="logoLocation" value="./img/logo.png" required /></td>
					<td>Enter the location of your logo eg:http://infinity360.co.uk/logo.png. Leave it as the default to use the default logo.</td>
				</tr>
				<tr>
					<td>Admin  username</td>
					<td><input class="fancyText" type="text" placeholder="admin username" name="adminUsername" required /></td>
					<td>This is the username for the admin account which will allow you to manage the products.</td>
				</tr>
				<tr>
					<td>Admin password</td>
					<td><input class="fancyText" type="text" placeholder="admin password" name="adminPassword" required /></td>
					<td>The password for the admin account.</td>
				</tr>
			</table>
			<input class="fancyButton" type="submit" value="Install!" name="submit" />
			</form>
		</div>
	</body>
</html>