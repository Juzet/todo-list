<!DOCTYPE html>
<html>
<head>
	<title>Simple To-Do List</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css"> -->
</head>
<body>
	<div class="wrap">
		<div class="task-list">
			<ul>
			<!-- requiring the connect file to this file -->
				<?php require ("includes/connect.php"); 
				// creating new mysqli
					$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
					// is selecting from all tasks 
					$query = "SELECT * FROM task ORDER BY date ASC, time ASC";

					if ($result = $mysqli->query($query)) {
						// we want all variables to go to this function
						$numrows = $result->num_rows;
						if($numrows>0) {
							// loop
							while($row = $result->fetch_assoc()) {
								$task_id = $row["id"];
								$task_name = $row["tasks"];
								// creating new variables 
								// echoing a basic idea using the variables
								echo '<li>
								<span>'.$task_name. '</span>
								<img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg"/>
								</li>';
							}
						}
					}
				?>
			</ul>
	</div>
	<form class="add-new-task" autocomplete="off">
	<!-- this will pop up on the screen  -->
		<input type="text" name="new-task" placeholder="Add new item..."/>
	</form>
	</div>
</body>
<!-- adding the jquery script tag -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); 
	// calling the add task function
	function add_task(){
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task]').val();

			if (new_task != '') {
				$.post('includes/add-tasks.php', {task: new_task}, function(data) {
					$('include/add-new-task input[name=new-task']).val();
						$(data).appendTo('.task-list ul').hide().fadeIn();
				})
			}
			return false;
		});
	}
	// when you click on this button there will be an annoymous function running
	$('.delete-button').click(function() {
		var current_element = $(this);
		var task_id = $(this).attr('id');
		// made two variables and called them
		$.post('includes/delete-task.php', {id: task_id}, function(){
		// fading out fast
		current_element.parent().fadeOut("fast", function()){
			$(this).remove();
		});
	});
});
</script>
</html>