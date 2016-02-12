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
		<title>Manage Questions :: <?php echo $siteTitle; ?></title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="adminContainer">
			<?php include'./resources/template/header.php'; ?>
			<div id="content">
				<h2>Manage Questions</h2>
				<?php getMenu(); ?>
				
				<h3>Add a question</h3>
				<form action="./resources/createQuestion.php" method="GET">
					<input type="text" class="fancyText" name="questionName" placeholder="Question Name" autofocus required/>
					<input type="submit" class="fancyButton" value="Add" />
				</form>
				
				<div class="section">
					<?php getQuestions(); ?>
				</div>
			</div>
		</div>
	</body>
</html>