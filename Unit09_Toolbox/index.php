<?php
	
// Variables 
require_once('site.variables.php');
	
// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('database connection failed');

// Database Query 
$query = "SELECT * FROM skills ORDER BY name ASC";

// Database Results 
$result = mysqli_query($dbconnection, $query) or die ('query failed');

// Convert Month
function convertMonth($x) {
	switch ($x) {
		case 1:
		$y = "January";
		break;
		case 2:
		$y = "Feburary";
		break;
		case 3:
		$y = "March";
		break;
		case 4:
		$y = "April";
		break;
		case 5:
		$y = "May";
		break;
		case 6:
		$y = "June";
		break;
		case 7:
		$y = "July";
		break;
		case 8:
		$y = "August";
		break;
		case 9:
		$y = "September";
		break;
		case 10:
		$y = "October";
		break;
		case 11:
		$y = "November";
		break;
		case 12:
		$y = "December";
		break;
	}
	return $y;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Directory | Unit 09 - Toolbox</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Utah Valley Coder Directory</h1>
			<hr>
		</header>
		<section>
			<article class="stroke-b">
			<?php 
				while ($row = mysqli_fetch_array($result)) {
					$day = substr($row[birthday], 3, 2);
					$monthNumber = substr($row[birthday], 0, 2);
					$monthName = convertMonth($monthNumber);
					$year = substr($row[birthday],6, 4);
					echo '<article class="directory-row">';
						echo '<h2>'.$row[name].'</h2>';
						echo '<p>Birthday is '.$monthName.' '.$day.', '.$year.'</p>';
						echo '<p>'.$row[skills].'</p>';
					echo '</article>';
				};
				// Database Disconnect 
				mysqli_close($dbconnection);
			?>
			</article>
		</section>
	</div>
</main>
</body>
</html>