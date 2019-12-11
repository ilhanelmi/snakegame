<?php
session_start();
include_once("db.php");
include_once("includes/navbar.php");
if(isset($_SESSION['user_id'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . md5($password). "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['uid'];
		$_SESSION['user_name'] = $row['user'];
		header("Location: index.php");
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body id="loginpage">
		<br><br><br><br><br><br><br><br>
      <div class="container">
  	<center><h2 style="color: white;">You need to log in to play the game</h2></center>
		<br>
  	<div class="row d-flex justify-content-center">
  		<div id="loginbox" class="col-md-4 col-md-offset-4 well ">
  			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
  				<fieldset>
  					<legend>Login</legend>
  					<div class="form-group">
  						<label for="name">Email</label>
  						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
  					</div>
  					<div class="form-group">
  						<label for="name">Password</label>
  						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
  					</div>
  					<div class="form-group">
  						<input type="submit" name="login" value="Login" class="btn btn-primary" />
  					</div>
						<div class="row d-flex justify-content-center">
							<div class="col-md-8 col-md-offset-8 text-center text-white">
							New User? <a href="register.php" class="text-white font-weight-bold">Sign Up Here</a>
							</div>
						</div>
  				</fieldset>
  			</form>
  			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
  		</div>
  	</div>
  </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
