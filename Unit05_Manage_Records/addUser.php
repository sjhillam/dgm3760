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
		<form action="saveToDatabase.php" method="POST" enctype="multipart/form-data" name="employee">
			<fieldset>	
				<legend>Information</legend>
				<label><span class="required">*</span>First Name:<input type="text" name="firstname" pattern="[a-zA-Z -._}{2,30}" required autofocus ></label>
				<label><span class="required">*</span>Last Name:<input type="text" name="lastname" pattern="[a-zA-Z -._}{2,30}" required ></label>
				<label><span class="required">*</span>Telephone:<input type="tel" name="telephone" required></label>
			</fieldset>
			<fieldset>
				<legend>Department</legend>
				<label><span class="required">*</span>Department:<input type="tel" name="department" value=""></label>
			</fieldset>
			<fieldset>
				<legend>Photo</legend>
				<label><span class="required">*</span>Photo:<input type="file" name="photo"></label>
				<span>File must be saved as a .jpg file.</span><br>
				<span>Please crop photo to 150px wide X 200px tall before uploading</span>
			</fieldset>
			<input type="submit" value="Add Employee">
		</form>
	</div>
</main>
</body>
</html>
