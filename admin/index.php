<?php

session_start();
$userID = $_SESSION['myusername'];

if(!isset($_SESSION['myusername']))
{
	//If the user is not logged in and a session doesn't exist
	header("location:login.php");
}

require('./resources/libraries/theWorks.php');
require('../resources/config.php');

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin :: <?php echo $siteTitle; ?></title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="adminContainer">
			<?php include'./resources/template/header.php'; ?>
			<div id="content">
				<h2>Products</h2>
				<?php getMenu() ?>
				<p>The products listed below are the ones which will be listed on the product selector/comparison page.</p>
				<table id="adminTable">
				<?php
				getHeaders();
				getProducts(); 
				?>
				</table>
			</div>
		</div>
	</body>
</html>
