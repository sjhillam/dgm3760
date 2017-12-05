<?php
// Security 
require_once('site.security.php');

// Variables 
require_once('site.variables.php');

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');

if (isset($_POST['submit'])) {

$firstName = mysqli_real_escape_string($dbconnection, trim($_POST['firstname']));
$lastName = mysqli_real_escape_string($dbconnection, trim($_POST['lastname']));
$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
$password1 = mysqli_real_escape_string($dbconnection, trim($_POST['password1']));
$password2 = mysqli_real_escape_string($dbconnection, trim($_POST['password2']));
	
	// Password Validation 
	if (!empty($username) && !empty($password1) && !empty($password2) &&($password1 == $password2)) {
		
		echo 'Passwords match';
		
	}
	
	// User Validation
	$queryUser = "SELECT * FROM users WHERE username = '$username'";
	$queryUserCheck = mysqli_query($dbconnection, $queryUser) or die ('query failed');
	
	if (mysqli_num_rows($queryUserCheck) == 0) {
		
	$query = "INSERT INTO users (firstName, lastName, username, password, date) VALUES ('$firstName','$lastName','$username', SHA('$password1'), NOW() )";
	mysqli_query($dbconnection, $query) or die ('insert query failed');
	
	// Cookies
	setcookie('username', $username, time() + (60*60*24*30));
	setcookie('firstname', $firstName, time() + (60*60*24*30));
	setcookie('lastname', $lastName, time() + (60*60*24*30));
	
	mysql_close($dbconnection);
	
	exit();
		
	} else {
		
		echo 'username already exists';
		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 07 | Request</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>User Request</h1>
			<hr>
		</header>
		<form action="" method="POST" enctype="multipart/form-data" name="SignUp">
			<fieldset>	
				<legend>Message</legend>
				<label><span class="required">*</span>Subject:<input type="text" name="password1" required></label>
				<label><span class="required">*</span>Message:<textarea col="4"></textarea></label>
			</fieldset>
			<input type="submit" name="submit" value="Sign In">
		</form>
	</div>
</main>
</body>
</html>