<?php
	require('db.php');
	include('includes/navbar.php');

  ?>
	<!DOCTYPE html><html><head>
	<script src="https://cdn.jsdelivr.net/npm/p5@0.10.2/lib/p5.js"></script>
	    <link rel="stylesheet" type="text/css" href="style.css">
	    <meta charset="utf-8">

	  </head>
	  <body>
			<br><br><br><br><br><br>
			<center><h1>Score 20 points to win the game!</h1></center>
	    <center><p id="scoreboard"> hello </p></center>
	    <center><button class=""id="btn" type="button" name="button"><img src="images/play1.png" alt="play"></button></center>
	    <center><button id="btn1" type="button" name="button"><img src="images/reset.png" alt="reset"></button></center>
	    <center><h2 id="pressStart">press start to play</h2></center>





	    <script src="snake.js"></script>
	    <script src="sketch.js"></script>


	</body></html>
