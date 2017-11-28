<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 03 | Make Message</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<nav>
	<ul>
		<li><a href="index.html">Newsletter Form</a></li>
		<li><a href="makeMessage.php">Make Message</a></li>
	</ul>
</nav>
<main>
	<section>
		<form action="sendMessage.php" method="POST" enctype="multipart/form-data">
			<fieldset>	
				<legend>Send Message</legend>
				<label>Subject:<input type="text" name="subject" pattern="[a-zA-Z -._}{2,30}" required></label>
				<label>Message:<textarea name="message" required></textarea></label>
			</fieldset>
			<input type="submit" value="Send">
		</form>
	</section>
</main>
</body>
</html>
