<?php
	require('db.php');
	include_once("includes/navbar.php");

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$author = $_SESSION['user_name'];
		$body = mysqli_real_escape_string($conn, $_POST['body']);

		$query = "INSERT INTO posts(title,author,body) VALUES('$title', '$author', '$body')";

		if(mysqli_query($conn, $query)){
			header('Location: index.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>
<br>
<br>
<br>
<br>
<br>
	<div class="container">
		<h1>Add Post</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
