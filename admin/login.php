<?php

session_start();
$userID = $_SESSION['myusername'];

if(isset($_SESSION['myusername']))
{
	header("location:index.php");
}

require('../resources/config.php');

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login :: <?php echo $siteTitle ?></title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="container">
			<?php include'./resources/template/header.php'; ?>
			<div id="content">
				<h2>Login</h2>
				<form action="checklogin.php" method="POST">
					<input class="fancyText" type="text" name="username" placeholder="username" required /><br>
					<input class="fancyText" type="password" name="password" placeholder="password" required />
					<input class="fancyButton" type="submit" value="Login" />
				</form>
			</div>
		</div>
	</body>
</html>