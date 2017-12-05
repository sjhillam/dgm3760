<?php
	
// Employee Variables 
$employee_id = $_GET[id];

// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');

if (isset($_POST['submit'])) {
	
	$query = "DELETE FROM employee WHERE id=$_POST[id]";
	
	$result = mysqli_query($dbconnection, $query) or die ('delete query failed');
	
	@unlink($_POST['photo']);
	
	header("location: http://dgm3760.stuarthillam.com/Unit05_Manage_Records/deleteFromDatabase.php");
	
	exit;
	
};

$query = "SELECT * FROM employee WHERE id=$employee_id";

$result = mysqli_query($dbconnection, $query) or die ('query failed');
 
$found = mysqli_fetch_array($result);

if(file_exists('employees/'.$found['photo']) && $found['photo'] <> ''){
	$photoPath = 'employees/'.$found['photo'];
} else{

};

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 05 | Manage Records</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<nav>
	<ul>
		<li><a href="index.php">Employee Directory</a></li>
		<li><a href="addUser.php">Add Employees</a></li>
		<li><a href="deleteFromDatabase.php">Delete Employees</a></li>
	</ul>
</nav>
<main>
	<div class="container">
		<header>
			<h1>Delete Employee</h1>
			<hr>
		</header>
		<form action="deleteFromDatabaseConfirmation.php" method="POST">
			<?php
				echo '<img src="'.$photoPath.'" alt="photo"/>';
				echo '<h2>'.$found['firstName'] .' '. $found['lastName'].'</h2>';
				echo '<p>';
				echo $found['department'].'<br>'.$found['phone'];
				echo '<p>';
			?>
			<input type="hidden" name="photo" value="employees/<?php echo $found['photo']; ?>">
			<input type="hidden" name="id" value="<?php echo $found['id']; ?>">
			<input type="submit" name="submit" value="Delete Employee">
			<a class="btn-primary" href="deleteFromDatabase.php">Cancel</a>
		</form>
	</div>
</main>
</body>
</html>
