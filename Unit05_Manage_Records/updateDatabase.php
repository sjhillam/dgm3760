<?php
	
// Employee Variables
$id = $_POST[id];
$first_name = $_POST[firstname];
$last_name = $_POST[lastname];
$telephone = $_POST[telephone];
$department = $_POST[department];
$photo = $_POST[photo];

// Employee img 
$img_extension = pathinfo($photo['name'], PATHINFO_EXTENSION);

$img_filepath = 'employees/';
$img_filename = $first_name . '_' . $last_name . time() . '.' . $img_extension;


// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');

$query = "UPDATE employee SET firstname='$first_name', lastname='$last_name', department='$department', phone='$telephone' WHERE id=$id";

$request = mysqli_query($dbconnection, $query) or die ('query failed');

$found = mysqli_fetch_array($request);

mysqli_close($dbconnection);
	
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
			<h1>Employee Information Updated</h1>
			<hr>
		</header>
		<?php
			echo "$first_name $last_name <br>";
			echo "$telephone <br>";
			echo "$department <br>";
			echo '<img src="'.$filepath.$filename.'" alt="photo"/>';
		?>
	</div>
</main>
</body>
</html>
