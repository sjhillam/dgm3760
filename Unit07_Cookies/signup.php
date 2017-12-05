<?php
require_once('site.variables.php');


// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('database connection failed');

if (isset($_POST['submit'])) {
	
	$firstName = mysqli_real_escape_string($dbconnection,trim($_POST['firstname']));
	$lastName = mysqli_real_escape_string($dbconnection,trim($_POST['lastname']));
	$username = mysqli_real_escape_string($dbconnection,trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbconnection,trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbconnection,trim($_POST['password2']));
	
	if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		
	$query = "SELECT * FROM users WHERE username = '$username'";
	
	$alreadyexists = mysqli_query($dbconnection, $query) or die ('query failed');
	
	if (mysqli_num_rows($alreadyexists) == 0) {
		
	  // INSERT the data
	  $query = "INSERT INTO users (firstName, lastName, username, password, date) VALUES ('$firstName', '$lastName', '$username', SHA('$password1'), NOW() )";
	  mysqli_query($dbconnection, $query) or die ('insert query failed');
	  
	  // CONFIRM MESSAGE
	  $feedback = '<p>Your new account has been successfully created.</p><p>Return to the <a href="index.php">Home Page</a>.</p>';
	  
	  // Make the cookie
	  setcookie('username', $username, time() + (60*60*24*30));
	  setcookie('firstname', $firstName, time() + (60*60*24*30));
	  setcookie('lastname', $lastName, time() + (60*60*24*30));
	  
	  // Close the connection
	  mysqli_close($dbconnection);

	} else {
	  $feedback = '<p class="error">An account already exists for this username. Please use a different name.</p>';
	} // end else
	} else {
	$feedback = 'please make sure passwords match and is not empty';
	} // end of empty check
} // end of the isset
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
<main>
	<div class="container">
		<header>
			<h1>User Sign Up</h1>
			<hr>
		</header>
		<?php
			echo $feedback;
			if ($feedback == '<p>Your new account has been successfully created.</p><p>Return to the <a href="index.php">main page</a>.</p>') {
		    	exit();
		  	}
		?>
		<form action="" method="POST" enctype="multipart/form-data" name="SignUp">
			<fieldset>	
				<legend>Sign Up Information</legend>
				<label><span class="required">*</span>First Name:<input type="text" name="firstname" pattern="[a-zA-Z -._}{2,30}" required autofocus value="<?php if (!empty($firstName)) echo $firstName; ?>"></label>
				<label><span class="required">*</span>Last Name:<input type="text" name="lastname" pattern="[a-zA-Z -._}{2,30}" required value="<?php if (!empty($lastName)) echo $lastName; ?>"></label>	
				<label><span class="required">*</span>Username:<input type="text" name="username" required value="<?php if (!empty($username)) echo $username; ?>"></label>
				<label><span class="required">*</span>Password:<input type="password" name="password1" required></label>
				<label><span class="required">*</span>Verify Password:<input type="password" name="password2" required></label>
			</fieldset>
			<input type="submit" name="submit" value="Sign Up">
			<a class="btn-default btn-delete" href="index.php">Cancel</a>
		</form>
	</div>
</main>
</body>
</html>
