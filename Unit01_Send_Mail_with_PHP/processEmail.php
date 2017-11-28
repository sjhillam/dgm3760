<?php
// Race Registration Variables
$registration_first_name = $_POST[firstname];
$registration_last_name = $_POST[lastname];
$registration_email = $_POST[email];
$registration_telephone = $_POST[telephone];
$registration_race = $_POST[race];
$registration_t_shirt_size = $_POST[tshirtsize];

// Race Registration Email 
$to = 'sjhillam@gmail.com';
$subject = 'Utah Valley Race Registration';
$message = "$registration_first_name $registration_last_name has signed up for the Utah Valley $registration_race race and has selected a size $registration_t_shirt_size T-Shirt. $registration_first_name $registration_last_name can either be reached at $registration_email or $registration_telephone";

mail($to, $subject, $message, 'FROM:'.$email);
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
				<p><?php echo $registration_first_name; ?> <?php echo $registration_last_name; ?> you are registered for the Utah Valley <?php echo $registration_race; ?> race. Pick up for your size <b> <?php echo $registration_t_shirt_size; ?></b> T-Shirt at the starting line booth on the morning of the race. Your race results will be sent to <?php echo $registration_email; ?> and <?php echo $registration_telephone; ?></p>
			</div>
		</article>
	</main>
</body>
</html>
