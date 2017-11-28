<?php
// Race Registration Variables
$registration_first_name = $_POST[firstname];
$registration_last_name = $_POST[lastname];
$registration_email = $_POST[email];
$registration_telephone = $_POST[telephone];
$registration_race = $_POST[race];
$registration_t_shirt_size = $_POST[tshirtsize];

// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');

// Database Query
$query = "INSERT INTO utah_valley_race_registration (firstName, lastName, email, telephone, race, tShirtSize) VALUES ('$registration_first_name','$registration_last_name','$registration_email','$registration_telephone','$registration_race','$registration_t_shirt_size')";

// Database Requests
$request = mysqli_query($dbconnection, $query) or die ('query failed');

// Database Disconnect  
mysqli_close($dbconnection);

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
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
				<p><?php echo $registration_first_name; ?> <?php echo $registration_last_name; ?> you are registered for the Utah Valley <?php echo $registration_race; ?> race. Pick up for your size <b> <?php echo $registration_t_shirt_size; ?></b> T-Shirt at the starting line booth. On the day of the race you will be sent a race confirmation to <?php echo $registration_email; ?> and <?php echo $registration_telephone; ?></p>
			</div>
		</article>
	</main>
</body>
</html>
