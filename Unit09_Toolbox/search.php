<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search | Unit 09 - Toolbox</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Search</h1>
			<hr>
		</header>
		<form action="search.php" method="POST" enctype="multipart/form-data" name="search">
			<fieldset>	
				<legend>Search</legend>
				<label>Skills:<input type="text" name="skill" required autofocus></label>
				<sup>Separate Multiple search items with a ,</sup>
			</fieldset>
			<input type="submit" value="Search" name="submit">
		</form>
	</div>
<?php 
	
// Variables 
require_once('site.variables.php');
	
// Database Connection
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('database connection failed');
	
if (isset($_POST['submit'])) {
	
	$skills = strtolower($_POST[skill]);
	$skillCleanUp = str_replace(',',' ',$skills);
	$searchTerms = explode(' ',$skillCleanUp);
	
	foreach ($searchTerms as $temp) {
		if(!empty($temp)) {
			$searchArray[] = $temp;
		} 
	}
	
	// WHERE Clause 
	$whereList = array();
	foreach($searchArray as $temp) {
		$whereList[] = "skills LIKE '%$temp%'";
	}
	$whereClause = implode(' OR ', $whereList);
	
	// Query 
	$query = "SELECT * FROM skills";
	if (!empty($whereClause)) {
		$query .= " WHERE $whereClause";
	}
	
	echo "<h2>Search Results for '" .$skillCleanUp. "'</h2>";
				
	// Database Results 
	$result = mysqli_query($dbconnection, $query) or die ('query failed');
	
	if (mysqli_num_rows($result) > 0) {	
		while ($row = mysqli_fetch_array($result)) {
			echo '<h3>'.$row[name] .'</h3>';
	
			$searchResults = strtolower($row[skills]);	
			foreach ($searchArray as $temp) {
				$insert = '<***>' . $temp . '</***>';
				$searchResults = str_replace($temp, $insert, $searchResults);
			}
		
			$searchResults = str_replace('***', 'span', $searchResults);
			echo '<p class="search-results">'.$searchResults.'</p>';
		}
	}
	else {
		echo "No skills found matching <strong>$skills</strong>";
	}
}

// Database Disconnect 	
mysqli_close($dbconnection);

?>
</main>
</body>
</html>
