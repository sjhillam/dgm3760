<?php
	
// Race Registration Variables
$newsletter_first_name = $_POST[firstname];
$newsletter_last_name = $_POST[lastname];
$newsletter_email = $_POST[email];

// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');

// Database Query
$query = "INSERT INTO newsletter (firstName, lastName, email) VALUES ('$newsletter_first_name','$newsletter_last_name','$newsletter_email')";

// Database Requests
$request = mysqli_query($dbconnection, $query) or die ('query failed');

// Database Disconnect  
mysqli_close($dbconnection);
	
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<main>
	<article>
		<div class="text-block">
			<h1>Thank you</h1>
			<hr>
			<p>You have been added to the newsletter.</p>
		</div>
	</article>
</main>
</body>
</html>
