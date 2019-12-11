<?php
session_start();
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Main page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow p-3 mb-5">
      <a class="navbar-brand" href="index.php"><strong>SNAKEGAME</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

<?php if(isset($_SESSION['user_id'])) { ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" href="game.php">Play Game</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="addpost.php">Add post</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Log out</a>
  </li>
</ul>

<ul class="navbar-nav ml-auto">
  <li>
<p class="text-white">Welcome, <?php echo $_SESSION['user_name'];?>!</p>
  </li>
</ul>
</div>
<?php } else { ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Sign up</a>
          </li>
        </ul>
        <?php } ?>

      </div>
    </nav>




    <script type="text/javascript" src="main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
