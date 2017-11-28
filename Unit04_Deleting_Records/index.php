<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 04 | Deleting Records</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<main>
	<section>
		<form action="<?php $SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" name="deleteRecords">
			<fieldset>	
				<legend>Manage Records</legend>
				<?php 
					// Database Connection
					$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');
					// Delete Records
					if(isset($_POST['submit'])) {
						foreach($_POST['delete_record'] as $delete) {
							$query = "DELETE FROM newsletter WHERE id=$delete";
							$results = mysqli_query($dbconnection, $query) or die ('query failed');
						};
					};
					// Database Requests
					$query = "SELECT * FROM newsletter";
					$results = mysqli_query($dbconnection, $query) or die ('query failed');					
					// Display Records 
					while ($row = mysqli_fetch_array($results)) {	
						echo '<label>';
						echo '<input type="checkbox" value="'.$row['id'].'"name="delete_record[]"/>';
						echo $row['firstName'] .' '. $row['lastName'] .' - '. $row['email'];
						echo '</label>';
						
					};
					// Database Disconnect  
					mysqli_close($dbconnection);
				?>
			</fieldset>
			<input type="submit" value="Remove" name="submit">
		</form>
	</section>
</main>
</body>
</html>