<?php

$id = $_GET['id'];

// Authorization  
require_once('comment.authorize.php');

// Variables 
require_once('site.variables.php');

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');

// Database Query 
$query = "UPDATE blog SET approved=1 WHERE id=$id";

// Database Results
$result = mysqli_query($dbconnection, $query) or die ('query failed');

header('Location: comment.approve.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 06 | Approve Comment</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Blog Comments</h1>
			<hr>
		</header>
	</div>
</main>
</body>
</html>