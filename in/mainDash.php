<?php
session_start(); include('../db/config.php');
include('../classes/User.php');
include('../classes/recipeContent.php');

$timeStamp = date("Y-m-d H:i");
$userName = $_SESSION['username'];
$userId = $_SESSION['userId'];

$user = new ServiceUser($timeStamp, $userName, $userId);
$recipe = new Recipe($timeStamp, $userName, $userId);
//Kicks user back to login if they do not have a session created
$user->kick_user();
$recipeArray = $recipe->fetchRecipes($conn);
//print_r($recipeArray);
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

  <div class="standard timeout">
    <h2>Welcome <?php echo $userName; ?> </h2>
    <p>What's for dinner tonight?</p>
	</div>
	<div class="standard">
		<?php
			//Checks if user has any recipes and prompts them to create one if not
			echo $user->check_new_user($conn);
		?>
		<button type="button" class="btn btn-success" id="displayRecipe">Show Recipes</button>
  </div>
	<div class="standard col-lg-12">
		<div class="col-sm-12" id="displayRecipeDiv"></div>
	</div>
	<script>
		window.setTimeout(function(){$('.timeout').slideUp()}, 2000);
	</script>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$("#displayRecipe").on("click", function(){
			$.ajax({
				method: "POST",
				url: "../ajax/displayRecipe.php",
				success: function(data){
					//console.log(data);
					$("#displayRecipeDiv").show();
					$("#displayRecipeDiv").html(data);
				},
				error: function(data){
					console.log('error');
				}
			});
		});
	</script>
	</body>
</body>
</html>
