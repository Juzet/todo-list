<?php
	// strip the tags that are coming in so we dont get any code we dont want
	$task = strip_tags($_POST['task']);
	// give a date stamp
	$date = date('Y-m-d');
	// giving a specific date and time
	$time = date('H:i:s');

	// adding our include video 
	include('connect.php');

	// running the mysqli connection
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	// want all the mysqli to query to put all this things into our database
	$mysqli->query("INSERT INTO tasks VALUES ('', 'task', '$date' '$time')");
	// want query to query the tasks we have
	$query = "SELECT * FROM tasks WHERE task='task' and date='date' and time='time' ";

?>