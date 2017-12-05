<?php
if (!isset($_COOKIE['username'])) {
	echo '<p>Please <a href="login.php">Login</a></p>';
	exit();
}	
?>
