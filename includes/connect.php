<?php
// this is important becuase it connects to the database
// localhost has to be first because you are using php and that uses localhost
$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	if ($mysqli->connect_error) {
		die('Connect Error(' . $mysqli_>connect_errno .')'
			. $mysqli->connect_error);
}
else {
	// echo "Connection made";
}
$mysqli->close();

?>