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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel = "stylesheet" type = "text/css" href = "../stylesheets/navigationBars.css" />

<script>
	setTimeout("$('.timeout').slideUp()", 2000);
</script>
</head>
<body>
  <div class="topnav">
    <a class="active" href="mainDash.php">HomeShelf</a>
    <a class="user" href="#"> <?php echo $userName; ?> </a>
		<button type="button" class="btn btn-success btn-sm" onclick="location.href='../index.php'" style="margin-top: 12px;"> Log Out </button>
  </div>
	<div class="sidenav">
		<a href="mainDash.php">DashBoard</a>
		<a href="allRecipes.php">Recipes</a>
		<a href="#">Ingredients</a>
		<a href="#">Meal Prep</a>
		<a href="#">Settings</a>
	</div>

  <button class="standard btn btn-lg bt-primary" type="button" id="newRecipe">Add Recipe</button>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
</body>
</html>
