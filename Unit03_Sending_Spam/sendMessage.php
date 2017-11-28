<?php
	
// Message Variables
$subject = $_POST[subject];
$message = $_POST[message];
$from = "10614669@uvu.edu";

// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');
$query = "SELECT * FROM newsletter";
$result = mysqli_query($dbconnection, $query) or die ('query failed');

// Display Names
while ($row = mysqli_fetch_array($result)) {
	$first_name = $row['firstName'];
	$last_name = $row['lastName'];
	$to = $row['email'];
	$newsletter_message = "Dear $first_name $last_name, $message";
	
	mail($to, $subject, $newsletter_message, 'From:' .$from);
};

// Database Disconnect  
mysqli_close($dbconnection);

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 03 | Send Message</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
	<main>
		<article>
			<div class="text-block">
				<h1>Mailing List</h1>
				<hr>
				<p>Messages have been sent to the following</p>
				<p><?php echo $to; '<br>'?></p>
			</div>
		</article>
	</main>
</body>
</html>
