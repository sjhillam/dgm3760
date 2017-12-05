<?php
//function pre_log($mixed) { echo '<pre>'; var_export($mixed); echo '</pre>'; }

// Variables 
require_once('site.variables.php');

if (isset($_POST['submit'])) {
	
	// Database Connection
	$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');
	
	// User Credentials 
	$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
	$password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));
	
	// Database Query 
	$query = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password')";
	$data = mysqli_query($dbconnection, $query) or die ('query failed');
	
	// Username Validation Check
	if (mysqli_num_rows($data) == 1) {
		$row = mysqli_fetch_array($data);
		
		// Cookies
		setcookie('username', $row['username'], time() + (60*60*24*30));
		setcookie('firstname', $row['firstName'], time() + (60*60*24*30));
		setcookie('lastname', $row['lastName'], time() + (60*60*24*30));
		header('Location: index.php');
		
	} else {
		$feedback = '<p>Could not find an account for ' . $_POST['username'] . '. Would you like to <a href="signup.php">Create Account</a></p>';
	}	
}$query = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password')";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 07 | Cookies</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<?php echo $feedback; ?>
<main>
	<div class="container">
		<header>
			<h1>User Login</h1>
			<hr>
		</header>
		<form action="login.php" method="POST" enctype="multipart/form-data" name="login">
			<fieldset>	
				<legend>Log In</legend>
				<label><span class="required">*</span>Username:<input type="text" name="username" required value=""></label>
				<label><span class="required">*</span>Password:<input type="password" name="password" required></label>
			</fieldset>
			<input type="submit" name="submit" value="Log In">
		</form>
		<a class="btn-default btn-delete" href="index.php">Cancel</a>
	</div>
</main>
</body>
</html>
