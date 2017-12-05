<?php
	
// Employee Variables 
$first_name = $_POST['firstname'];
$last_name  = $_POST['lastname'];
$telephone  = $_POST['telephone'];
$department = $_POST['department'];
$photo = $_FILES['photo'];

// Employee img 
$img_extension = pathinfo($photo['name'], PATHINFO_EXTENSION);

$img_filepath = 'employees/';
$img_filename = $first_name . '_' . $last_name . time() . '.' . $img_extension;

// Verification 

$validImage = true;

if ($photo['size'] == 0) {
	echo 'ERROR -- Please select an image';
	$validImage = false;
};

if ($photo['size'] > 204800) {
	echo 'ERROR -- Image is larger than 200kb. Please use smaller image.';
	$validImage = false;
};

if ($photo['type'] == 'image/gif' || $photo['type'] == 'image/jpeg' || $photo['type'] == 'image/png') {
	
} else {
	echo 'ERROR -- Wrong file format. Please use JPEG, PNG, or GIF';
	$validImage = false;
};

if ($validImage == true) {
	$tmp_name = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp_name, "$img_filepath$img_filename");
	@unlink($_FILES['photo']['tmp_name']);
	
	// Database Connection
	$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');
	
	$query = "INSERT INTO employee (firstName, lastName, department, phone, photo) VALUES ('$first_name','$last_name','$department','$telephone','$img_filename')";
	
	$request = mysqli_query($dbconnection, $query) or die ('query failed');
	
 	mysqli_close($dbconnection);
	
} else {
	
	echo '<a href="index.php">ERROR -- Please try Again.</a>';
	
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
			<h1>Employee</h1>
			<hr>
		</header>
		<?php
			echo "$first_name $last_name <br>";
			echo "$telephone <br>";
			echo "$department <br>";
			echo '<img src="'.$img_filepath.$img_filename.'" />';
		?>
	</div>
</main>
</body>
</html>
