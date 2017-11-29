<?php 

$id = $_GET['id'];

require_once('site.variables.php');

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');
$query = "DELETE FROM blog WHERE id=$id";
$result = mysqli_query($dbconnection, $query) or die ('query failed');

header('Location: comment.approve.php');
?>
