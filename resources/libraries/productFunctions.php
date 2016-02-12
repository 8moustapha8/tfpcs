<?php

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

function get_products(){
	
	$x = 0;
	$query = "SELECT * FROM products WHERE id >=0";
	
	
	for ($y = 0; $y <= countQuestions(); $y++)
	{
		$q_number = "q" . $y;
		//echo $q_number;
		
		if(isset($_GET['q' . $y]))
		{
			$query = $query . " AND q" . $y . " = 1";
		}
	}
	
	//echo '<br>'.$query;
	
	
	$data = mysql_query($query) 
	or die(mysql_error());
	
	while($row = mysql_fetch_array( $data ))
	{
		$x = $x + 1;
		$title = $row['title'];
		$description = $row['description'];
		$date = $row['date'];
		$link = $row['link'];
		
		echo'<a href="'.$link.'"><div class="userThumbDiv"><img class="albumThumb" width="100px" height="100px" src="'.$row['img'].'"/><p>' . $row['title'] . '</p></div></a>';
	}
	
	echo '<br>Returned ' . $x . ' result(s).';
	
}


function get_questions(){
	
	$theParams = basename($_SERVER['REQUEST_URI']);
	$theParams = "?ref=1" . $theParams;
	
	$data = mysql_query("SELECT * FROM questions") 
	or die(mysql_error());
	
	
	echo '<a href="index.php">[Clear Filters]</a><br>&nbsp';
	echo '<ul id="questionList">';
	
	while($row = mysql_fetch_array( $data ))
	{
		$title = $row['title'];
		$id = $row['id'];
		$newURL = $theParams . '&q'.$id.'=1';
		$currentQuestion = $_GET['q' . $id];
		
		if(isset($currentQuestion))
		{
			$styleID = 'questionSelect';
		}else{
			$styleID = 'questionNot';
		}
		
		//echo '<input class="checkbox" type="checkbox" value="'.$newURL.'">' . $title . '<br>';
		echo '<li>-<a style="display:inline" id="'. $styleID . '" class="questionLink" href="'.$newURL.'">'.$title.'</a></li><br>';
	}
	
	echo '</ul>';
	
}