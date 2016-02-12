<?php

function getMenu(){
	echo'<ul id="theMenu">
					<li><a href="index.php">Home</a></li>
					<li><a href="manage_questions.php">Manage Questions</a></li>
					<li><a href="add_product.php">Add Product</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>';
}

function getQuestions(){
	$data = mysql_query("SELECT * FROM questions ORDER BY id DESC") 
	or die(mysql_error());
	
	echo '<table id="adminTable">';
	echo '<th>id</th>';
	echo '<th>question</th>';
	echo '<th>delete</th>';
	
	while($row = mysql_fetch_array( $data ))
	{
		$title = $row['title'];
		$id = $row['id'];
		
		echo '<tr>';
		echo '<td>'.$id.'</td>';
		echo '<td>'.$title.'</td>';
		echo '<td style="text-align:center;"><a href="./resources/deleteQuestion.php?id='.$id.'"><img src="./img/delete.png" width="20px"></a></td>';
		echo '</tr>';
	}
	
	echo'</table>';
}

function countQuestions()
{
	$data = mysql_query("SELECT * FROM questions") 
	or die(mysql_error());
	
	while($row = mysql_fetch_array( $data ))
	{
		$count=mysql_num_rows($data);
		return $count;
	}
}

function getHeaders(){
	$data = mysql_query("SELECT * FROM questions") 
	or die(mysql_error());
	
	//Print the default headers like the id and title
	echo '<tr>';
	echo '<th>id</th>';
	echo '<th>title</th>';
	echo '<th>description</th>';
	echo '<th>image</th>';
	echo '<th>page</th>';
	echo '<th>Save</th>';
	
	while($row = mysql_fetch_array( $data ))
	{
		$qID = $row['id'];
		$qTitle = $row['title'];
		echo '<th>' . $qTitle . '</th>';
	}
	echo '<th>delete</th>';
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
		echo '<td><form action="./resources/saveData.php" method="GET"><input type="text" name="id" value="'.$id.'"></td>';
		echo '<td><textarea name="productTitle">'.$title.'</textarea></td>';
		echo '<td><textarea name="productDesc">'.$description.'</textarea></td>';
		echo '<td><textarea name="productImg">'.$image.'</textarea></td>';
		echo '<td><textarea name="productLink">'.$link.'</textarea></td>';
		echo '<td><input style="background-color:lightgreen;" value="← Save" type="submit"></form></td>';
		
		
		//Get all the checkbox data. Should be fun...
		
		$y = 0;
		
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
				$checked = "checked";
			}else{
				$checked = "";
			}
			
			$data3 = mysql_query("SELECT * FROM questions WHERE id = '$y'") 
			or die(mysql_error());
			
			while($row3 = mysql_fetch_array( $data3 ))
			{
				$qID = $row3['id'];
			}
			
			echo'<SCRIPT LANGUAGE="JavaScript">
			<!-- 
			function jump'.$qID.$id . '()
			{
				window.location.href = "./resources/changeData.php?id=' . $id . '&q=' . $qID . '&checked='.$checked.'&anchor='.$qID.$id . '";
			}
			// -->
			</SCRIPT>';
			
			echo '<td><input name="'.$qID.$id . '" onClick="jump'.$qID.$id . '()" type="checkbox" value="'.$status.'" '.$checked.' /></td>';
			
		}
		
		echo '<td style="text-align:center;"><a href="./resources/deleteProduct.php?id='.$id.'"><img src="./img/delete.png" width="20px"></a></td>';
		
		echo '</tr>';
	}
	
	echo '</table>';
}

?>