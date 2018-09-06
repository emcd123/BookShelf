<?php
session_start(); include('db/config.php');
$timeStamp = date("Y-m-d H:i");
$userName = $_SESSION['username'];
$userId = $_SESSION['userId'];
if($userId === NULL){
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel = "stylesheet" type = "text/css" href = "../stylesheets/navigationBars.css" />
</head>
<body>
  <div class="topnav">
    <a class="active" href="mainDash.php">HomeShelf</a>
    <a class="user" href="#"> <?php echo $userName; ?> </a>
		<button type="button" class="btn btn-success btn-sm" onclick="location.href='../index.php'" style="margin-top: 12px;"> Log Out </button>
  </div>
	<div class="sidenav">
		<a href="mainDash.php">DashBoard</a>
		<a href="#">Recipes</a>
		<a href="#">Ingredients</a>
		<a href="#">Meal Prep</a>
		<a href="#">Settings</a>
	</div>

  <div style="padding-left:250px">
    <h2>Top Navigation Example</h2>
    <p>Some content..</p>
  </div>


</body>
</html>
