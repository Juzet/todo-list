<?php
	// this is important becuase it connects to the database
	// localhost has to be first because you are using php and that uses localhost
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	// this if statement is constantly running everytime the file is opened
		if ($mysqli->connect_error) {
			die('Connect Error(' . $mysqli_>connect_errno .')'
				. $mysqli->connect_error);
	}
	else {
		// echo "Connection made";
	}
	// closing the statement
	$mysqli->close();

?>