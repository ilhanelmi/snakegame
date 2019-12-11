<?php
require('db.php');
include_once("includes/navbar.php");


//Get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

//Create Query
$query = 'SELECT * FROM posts WHERE id =' .$id;

//Get Result
$result = mysqli_query($conn, $query);

//Fetch Data
$post = mysqli_fetch_assoc($result);
//var_dump($posts);

//Free Result
mysqli_free_result($result);

//Close connection
mysqli_close($conn);

?>

<br>
<br>
<br>
<br>
<br>

	<div class="container">
	<a href="<?php echo 'index.php'; ?>" class="btn-outline-primary">Back</a>
	<h1><?php echo $post['title'];?></h1>
		<small>Created on <?php echo $post ['created_at']; ?> by
		<?php echo $post ['author'];?></small>
		<p><?php echo $post ['body'];?></p>
		<hr>
		<a href="<?php echo 'editpost.php'?>?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>


	</div>
<?php include ("inc/footer.php"); ?>
