<!DOCTYPE html>
<html>
<head>
	<title>Superdating - love is power</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Superdating - Find love</h1>
<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	// Include and initiate the database class (you only have to do this once)
	include('classes/database.php');
	$database = new Database;
	$database->connect();



	// Get all the names
	$names = $database->query('SELECT * FROM superheroes');
	//var_dump($names);
	$likes = $database->query('SELECT * FROM count_likes');
	$comments = $database->query('SELECT * FROM comments');

	// Loop through all names
	foreach ($names as $name) {
		?>
		<article class="name">
			<p>
				<img src="<?php echo $name['image'];?>">
			</p>
			<input type="submit" name="like me" value="Like me">
			<!-- <button type="button" name="button">like me</button> -->
				<h3>Likes: <?php echo $likes['number_of_likes'];?></h3>
			<h2><?php echo $name['name'];?></h2>
			<h4>Age: <?php echo $name['age'];?></h4>
    	<h4>Gender: <?php echo $name['gender'];?></h4>
      <h4>Current location: <?php echo $name['location'];?></h4>
      <h4>Superpower: <?php echo $name['superpower'];?></h4>
    	<h4>Description: <?php echo $name['description'];?></h4>
				<h4>Comments: <?php echo $comments['comment_text'];?></h4>
					<a href="hulk.php">Read more or make a comment</a>
		</article>
		<?php
	}
?>
</body>
</html>
