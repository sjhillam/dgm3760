<?php 
	
// Database Connection
$dbconnection = mysqli_connect('localhost', 'houseqc0_user', '#);)H}FMTKAZ', 'houseqc0_3760') or die ('connection failed');

$query = "SELECT * FROM employee ORDER BY lastName ASC";

$result = mysqli_query($dbconnection, $query) or die ('query failed');	

?>
<!DOCTYPE html>
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
<header>
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
			<h1>Employee Directory</h1>
			<hr>
		</header>
		<p>Click on employee name to view details</p>
		<?php
			while ($row = mysqli_fetch_array($result)) {
				echo '<div class="employee-row">';
					echo '<p>';
						echo '<a class="employee-row-details" href="details.php?id='.$row['id'].'">';
							echo $row['lastName'] .', '. $row["firstName"].' - '.$row['department'];
						echo '</a>';
					echo '</p>';
					echo '<p>';
						echo '<a class="btn-primary" href="updateUser.php?id='.$row['id'].'">update</a>';
					echo '</p>';
				echo '</div>';
			};
			// Database Disconnect 
			mysqli_close($dbconnection);
		?>

	</div>
</main>
</body>
</html>