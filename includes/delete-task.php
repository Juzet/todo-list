<?php 
		$task_id = strip_tags($_POST['id']);
		require('connect.php');
		// new variable
		$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
		// going to query through our task function
		if ($result = $mysqli->query()) {

		}

?>