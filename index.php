<?php
include_once("includes/navbar.php");
 ?>
 <?php
 require ('db.php');



 //Create query

 $query = 'SELECT * FROM posts ORDER BY created_at DESC';

 //Get result

 $result = mysqli_query($conn, $query);

 //Fetch data

 $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
 //var_dump($posts);

 //Free Result

 mysqli_free_result($result);

 //Close Connection

 mysqli_close($conn);

 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Main page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">
 </head>
  <body id="newspage">


<?php if(isset($_SESSION['user_id'])) { ?>



<br><br><br><br>
<div  class="container col-8">

  <h2 class="col-8 text-white" style="margin-left: 6%">New games incoming</h2>
  <div class="paragraphs col-4 float-left" style="margin-left: 6%">
    <div class="row">
      <div  id="newsbox" class="span4">
        <img style="float:left" src="images/pacman.jpg"/>
        <div class="content-heading text-white"><h3>Experience &nbsp </h3></div>
        <p class="text-white">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
      </div>
    </div>
  </div>

    <div class="container col-4 float-right">

   	<h1 class="text-white">Latest</h1>
   	<?php foreach($posts as $post): ?>
   	<div id="postsbox" class="text-white well">
   		<h3><?php echo $post['title'];?></h3>
   		<small>Created on <?php echo $post ['created_at']; ?> by
   		<?php echo $post ['author'];?></small>
   		<p><?php echo $post ['body'];?></p>
   		<a class="btn-outline-primary" href="post.php?id=<?php echo $post ['id']; ?>">Read More</a>
   	</div>

   	<?php endforeach;?>
   	</div>
    </div>
<?php } else { ?>

  <header class="masthead">
<div class="container">
  <div class="row h-100 align-items-center">
    <div class="col-12 text-center">
      <h1 class="font-weight-light text-white">Sign up to play the game</h1>
      <p class="lead text-white">You can sign up here</p><br>
<a class= "shadow p-3 mb-5"id="signup" href="register.php">Sign up</a>
    </div>
  </div>
</div>
</header>


      <?php } ?>

  </body>
</html>
