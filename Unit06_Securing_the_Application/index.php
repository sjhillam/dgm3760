<?php
// Variables 
require_once('site.variables.php');

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');

// Database Query 
$query = "SELECT * FROM blog WHERE approved=1 ORDER BY date";

// Database Results 
$result = mysqli_query($dbconnection, $query) or die ('query failed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 06 | Securing the Application</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Comment Board</h1>
			<hr>
		</header>
		<?php	
		while ($row = mysqli_fetch_array($result)) {
			echo '<article class="comment-block">';
				echo '<h3>'.'Name: ' .$row['name'].'</h3>';
				echo '<p>'.'Topic: ' .$row['topic'].'</p>';
				echo '<p>'.'Date: ' .$row['date'].'</p>';
				echo '<p>'.'Comment: ' .$row['comment'].'</p>';
			echo '</article>';
		}			
		?>
	</div>
</main>
</body>
</html>