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
		<title>Add Product :: <?php echo $siteTitle; ?></title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="loginContainer">
			<?php include'./resources/template/header.php'; ?>
			<div id="content">
				<h2>Add Product</h2>
				<?php getMenu(); ?>
				
				<div class="section">
					<p>Type in a product name to add a product to the database.</p>
					<form action="./resources/createProduct.php" method="GET">
						<input type="text" class="fancyText" name="productName" placeholder="Product Name" autofocus required/>
						<input type="submit" class="fancyButton" value="Add" />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>