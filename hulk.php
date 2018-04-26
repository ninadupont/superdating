<!DOCTYPE html>
<html>
<head>
	<title>Hulk</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Hulk</h1>
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
	$hulk = $database->query("SELECT * FROM superheroes
  WHERE name ='Hulk'");
	// var_dump($hulk);
	// $likes = $database->query('SELECT * FROM count_likes');
	// $comments = $database->query('SELECT * FROM comments');
  // Loop through all names
	foreach ($hulk as $hulk_hulk) {
		?>
		<article class="name">
			<p>
				<img src="<?php echo $hulk_hulk['image'];?>">
			</p>
			<input type="submit" name="like me" value="Like me">
			<!-- <button type="button" name="button">like me</button> -->

			<h2><?php echo $hulk_hulk['name'];?></h2>
			<h4>Age: <?php echo $hulk_hulk['age'];?></h4>
    	<h4>Gender: <?php echo $hulk_hulk['gender'];?></h4>
      <h4>Current location: <?php echo $hulk_hulk['location'];?></h4>
      <h4>Superpower: <?php echo $hulk_hulk['superpower'];?></h4>
    	<h4>Description: <?php echo $hulk_hulk['description'];?></h4>
		</article>
    <article class="comment">
      <input type="text" name="" value="">
      <input type="submit" name="" value="send">
    </article>
    <?php
  }
  ?>
<?php

  	// check what is received through POST
  	var_dump($_POST); die();
  	include('classes/database.php');
  	$database = new Database;
  	$database->connect();
  	//- - - Add new movie - - -
  	// First, prepare the SQL
  	$sql = "INSERT INTO comments (
  							comment_text,
  						)
  			VALUES (?)";

  	// Secondly, add values
  	$values = array(
  		$_POST['comment_text'],
  	);

  	// Call prepared function to execute the above
  	$database->prepared($sql,$values);

  ?>
  <p class="notice success">Brilliant! This was added to the database
  </p>


  <?php
  // Get all types from the database
  	include('classes/database.php');
  	$database = new Database;
  	$database->connect();

  	// Select all types
  	$sql = "SELECT * FROM comments";
  	$types = $database->query($sql);
  ?>
  <article class="">


      <form action="process.php" method="post">
      	<label for="comment_text">Description</label>
      	<textarea name="description"></textarea>


      	<label for="type">Type</label>
      	<select name="type">
      		<?php
      		// insert an option for each type
      		foreach ($types as $type) {
      			?>
    			<option value="<?php echo $type['type'];?>"><?php echo $type['type'];?></option>
      			<?php
      		}
      		?>
      	</select>

      	<input type="submit" name="submit" value="Add">
      </form>
  </article>
</body>
</html>
