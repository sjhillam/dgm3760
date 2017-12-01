<?php
// Authorization
require_once('comment.authorize.php');

// Variables 
require_once('site.variables.php');

// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('connection failed');

// Database Query 
$query = "SELECT * FROM blog WHERE approved=0 ORDER BY date";

// Database Results 
$result = mysqli_query($dbconnection, $query) or die ('query failed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit 06 | Approve Comment</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Approve Comments</h1>
			<hr>
		</header>
		<?php
		if (mysqli_num_rows($result) == 0) {
			echo '<p>All comments have been approved</p>';
		} else {
			while ($row = mysqli_fetch_array($result)) {
				echo '<article class="comment-block">';
					echo '<h2>'.$row['name'].'</h2>';
					echo '<p>'.$row['topic'].'</p>';
					echo '<p>'.$row['comment'].'</p>';
					echo '<p>'.$row['date'].'</p>';
					echo '<a class="btn-default btn-primary" href=comment.approval.php?id='.$row['id'].'>Approve</a>';
					echo '<a class="btn-default btn-delete"  href=comment.delete.php?id='.$row['id'].'>Delete</a>';
				echo '</article>';
			}
		}		
		?>
	</div>
</main>
</body>
</html>