<?php
	
if (isset($_POST['submit'])) {
	 
	// Variables
	require_once('site.variables.php');
	
	$name = $_POST[name];
	$day = $_POST[day];
	$month = $_POST[month];
	$year = $_POST[year];
	$skills = $_POST[skills];
	$birthday = $day.'_'.$month.'_'.$year;
	
	// Database Connection
	$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('database connection failed');
	
	// Database Query 
	$query = "INSERT INTO skills (name, birthday, skills) VALUES ('$name','$birthday','$skills')";
	
	// Database Results 
	$result = mysqli_query($dbconnection, $query) or die ('query failed');
	
	// Database Disconnect 
	mysqli_close($dbconnection);
	
	header('Location: index.php');
	
	exit;	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add | Unit 09 - Toolbox</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once('site.navigation.php'); ?>
<main>
	<div class="container">
		<header>
			<h1>Add Coder</h1>
			<hr>
		</header>
		<form action="add.php" method="POST" enctype="multipart/form-data" name="add">
			<fieldset>	
				<legend>Add</legend>
				<label><span class="required">*</span>Full Name:<input type="text" name="name" pattern="[a-zA-Z -._}{2,30}" required autofocus></label>
				<label class="birthday">
					<span class="required">*</span>Birthday:
					<select type="number" name="day" required>
					    <option>01</option>
					    <option>02</option>
					    <option>03</option>
					    <option>04</option>
					    <option>05</option>
					    <option>06</option>
					    <option>07</option>
					    <option>08</option>
					    <option>09</option>
					    <option>10</option>
					    <option>11</option>
					    <option>12</option>
					    <option>13</option>
					    <option>14</option>
					    <option>15</option>
					    <option>16</option>
					    <option>17</option>
					    <option>18</option>
					    <option>19</option>
					    <option>20</option>
					    <option>21</option>
					    <option>22</option>
					    <option>23</option>
					    <option>24</option>
					    <option>25</option>
					    <option>26</option>
					    <option>27</option>
					    <option>28</option>
					    <option>29</option>
					    <option>30</option>
					    <option>31</option>
					</select>
					<select type="number" name="month" required>
					    <option>01</option>
					    <option>02</option>
					    <option>03</option>
					    <option>04</option>
					    <option>05</option>
					    <option>06</option>
					    <option>07</option>
					    <option>08</option>
					    <option>09</option>
					    <option>10</option>
					    <option>11</option>
					    <option>12</option>
					</select>
					<input type="number" name="year" placeholder='1994' pattern="[0-9]{4}" required >
				</label>
				<label><span class="required">*</span>Skills:</label>
				<textarea rows="5" name="skills" required></textarea>
			</fieldset>
			<input type="submit" value="Submit" name="submit">
		</form>
	</div>
</main>
</body>
</html>
