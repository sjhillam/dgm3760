<nav>
	<p>Hello, 
	<?php 	
		if (isset($_COOKIE['username'])) {	
		echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];
		echo ' | <a href="logout.php">Log Out</a>';
		
		} else {
		echo '<a href="login.php">Login</a> <a href="signup.php">Create Account</a>';
		}
	?>
	</p>
</nav>
