<?php
include('classes/database.php');


$database = new Database;
$database->connect();

$sql = "SELECT * FROM comments LEFT JOIN superheroes ON comments.superhero_from = superheroes.id";

$comments = $database->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Superdating - love is power</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Form example</h1>

<form action="add-comment.php" method="post">
  <input type="hidden" name="superhero_from" value="2">
  <input type="hidden" name="superhero_to" value="3">

  <label for="text">Your comment</label>
  <input type="text" name="text" id="text" value="">

  <input type="submit" name="submit" value="Add">
</form>

<h2>Comments</h2>
<?php
foreach ($comments as $comment) {
?>
<dl>
  <dt><b><?php echo $comment["name"];?></b></dt>
  <dd><?php echo $comment["text"];?></dd>
</dl>
<?php
}
?>
</body>
</html>
