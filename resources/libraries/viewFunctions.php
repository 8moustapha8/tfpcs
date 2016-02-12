<?php

function normalView(){
	echo '<p>Click on some of the filters to alter your query.</p>';
	echo'<table width="100%">
		<tr>
			<td style="width:20%;vertical-align:top;">';
				get_questions();
			echo'</td>
			<td style="vertical-align:top;">';
				get_products();
			echo'</td>
		</tr>
	</table>';
}

function compareView(){
	echo '<table id="compareTable">';
	getHeaders();
	getProducts();
	echo '</table>';
}


//Functions for the comparison view
function getHeaders(){
	$data = mysql_query("SELECT * FROM questions") 
	or die(mysql_error());
	
	//Print the default headers like the id and title
	echo '<tr>';
	echo '<th>Product</th>';
	
	while($row = mysql_fetch_array( $data ))
	{
		$qID = $row['id'];
		$qTitle = $row['title'];
		echo '<th>' . $qTitle . '</th>';
	}
	echo '</tr>';
}

function getProducts(){
	$data = mysql_query("SELECT * FROM products ORDER BY id DESC") 
	or die(mysql_error());
	
	
	
	while($row = mysql_fetch_array( $data ))
	{
		$id = $row['id'];
		$title = $row['title'];
		$description = $row['description'];
		$image = $row['img'];
		$link = $row['link'];
		
		//Print the records out with all the textboxes and such.
		echo '<tr>';
		echo '<td><a href="'.$link.'"><div class="userThumbDiv2"><img class="albumThumb" width="50px" height="50px" src="'.$row['img'].'"/><p>' . $row['title'] . '</p></div></a></td>';
		
		
		$data10 = mysql_query("SELECT * FROM questions") 
		or die(mysql_error());
	
		while($row10 = mysql_fetch_array( $data10 ))
		{
			$y = $row10['id'];
			
			$q_number = "q" . $y;
			
			$data2 = mysql_query("SELECT * FROM products WHERE id = '$id'") 
			or die(mysql_error());
			
			while($row2 = mysql_fetch_array( $data2 ))
			{
				$status = $row2['q' . $y];
			}
			
			if($status == 1)
			{
				echo '<td style="text-align:center;"><img src="./img/tick.png" width="30px" height="30px"></td>';
			}else{
				echo '<td style="text-align:center;">-</td>';
			}
		

			
			
		}

		echo '</tr>';
	}

}

?>
