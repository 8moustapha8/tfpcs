<?php
require('./resources/config.php');
require('./resources/libraries/productFunctions.php');
require('./resources/libraries/viewFunctions.php');

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Coomber Product Selection</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="container">
			<div id="header" style="background-color:black;text-align:right;padding:5px;">
				<table width="100%">
					<tr>
						<td><h1 style="text-align:left;margin:0;color:white;"><?php echo $siteTitle; ?> Product Comparison</h1></td>
						<td><img style="max-height:200px;max-width:180px;" src="<?php echo $siteLogo; ?>"></td>
					</tr>
				</table>
			</div>
			<ul id="userMenu">
				<li><a href="index.php">Normal View</a></li>
				<li><a href="index.php?view=compare">Comparison View</a></li>
			</ul>
			
				<?php 
				if(isset($_GET['view']))
				{
					if($_GET['view'] == "normal")
					{
						echo'<div id="content">';
						normalView();
						echo'</div>';
					}elseif($_GET['view'] == "compare")
					{
						echo'<div style="background-color:white;">';
						compareView();
						echo'</div>';
					}else{
						normalView();
					}
				}else{
					echo'<div id="content">';
					normalView();
					echo'</div>';
				}
				?>
			</div>
		</div>
	</body>
</html>