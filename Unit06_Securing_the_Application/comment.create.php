<?php
require_once('site.variables.php');

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');
$query = "SELECT * FROM employee ORDER BY lastName ASC";
$result = mysqli_query($dbconnection, $query) or die ('query failed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 06 | Create Comment</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<header>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Create Comment</h1>
			<hr>
		</header>
		<form action="comment.add.php" method="POST" enctype="multipart/form-data" name="createComment">
			<fieldset>	
				<legend>Information</legend>
				<label><span class="required">*</span> Name:<input type="text" name="name" pattern="[a-zA-Z -._}{2,30}" required autofocus></label>
				<label>
					<span class="required">*</span> Topic:
					<select name="topic" required>
					    <option>Health</option>
					    <option>Science</option>
					    <option>Technology</option>
					    <option>Business</option>
					    <option>Entertainment</option>
					</select>	
				</label>
				<label><span class="required">*</span> Comment:</label>
				<textarea rows="5" name="comment" required></textarea>
			</fieldset>
			<input type="submit" value="Add Comment">
		</form>
	</div>
</main>
</body>
</html>

