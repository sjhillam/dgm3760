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
	$photoPath = 'employees/missing.jpg';
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
		<form action="updateDatabase.php" method="POST" enctype="multipart/form-data" name="update">
			<fieldset>	
				<legend>Update Employee</legend>
				<label><span class="required">*</span>First Name:<input type="text" name="firstname" pattern="[a-zA-Z -._}{2,30}" value="<?php echo $found['firstName'];?>" required autofocus ></label>
				<label><span class="required">*</span>Last Name:<input type="text" name="lastname" pattern="[a-zA-Z -._}{2,30}" value="<?php echo $found['lastName'];?>" required></label>
				<label><span class="required">*</span>Telephone:<input type="tel" name="telephone" value="<?php echo $found['phone'];?>" required></label>
			</fieldset>
			<fieldset>
				<legend>Department</legend>
				<label><span class="required">*</span>Department:<input type="text" name="department" value="<?php echo $found['department'];?>"></label>
			</fieldset>
			<fieldset>
				<legend>Photo</legend>
				<label><span class="required">*</span>Photo:<input type="file" name="photo" value="<?php echo $found['photo'];?>"></label>
			</fieldset>
			<input type="hidden" value="<?php echo $found['id']; ?>" name="id">
			<input type="submit" value="Update Employee">
		</form>
	</div>
</main>
</body>
</html>
