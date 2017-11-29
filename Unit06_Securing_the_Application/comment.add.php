<?php
// Variables
require_once('site.variables.php');

$name = $_POST[name];
$topic = $_POST[topic];
$comment = $_POST[comment];
$date = date("m-d-Y");

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');

// Database Query 
$query = "INSERT INTO blog (name, topic, comment, date) VALUES ('$name','$topic','$comment','$date')";

// Databse Request
$request = mysqli_query($dbconnection, $query) or die ('query failed');

// Database Disconnect 
mysqli_close($dbconnection);

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
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Comment Added</h1>
			<hr>
		</header>
	</div>
</main>
</body>
</html>