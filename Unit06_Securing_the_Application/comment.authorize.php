<?php
// Variables 
$username = 'admin';
$password = 'comment';
// Authorization 
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
	header('HTTP/1.1 401 unauthorized');
	header('WWW-Authenticate: Basic realm="Please Enter a Valid Password"');
	exit('<h1>Please enter a valid username and password</h1>');
}
?>
