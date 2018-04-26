<?php
$superhero_id = $_GET["superhero_id"];

include('classes/database.php');

$database = new Database;
$database->connect();

$sql = "SELECT * FROM superheroes WHERE id = $superhero_id";

$superhero = $database->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $superhero["name"];?> - Superdating - love is power</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $superhero["name"];?></h1>
</body>
</html>
