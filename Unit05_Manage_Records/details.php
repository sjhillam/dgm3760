<?php
	
// Variables 
$employee_id = $_GET[id];

// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');

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
		<?php
			echo '<img src="'.$photoPath.'" alt="photo"/>';
			echo '<h2>'.$found['firstName'] .' '.$found['lastName'].'<h2>';
			echo '<p>' .$found['department'].'</p>';
			echo '<p>' .$found['phone'].'</p>';

		?>	
	</div>
</main>
</body>
</html>
