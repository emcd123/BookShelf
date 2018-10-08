<?php
session_start(); include('../db/config.php');
include('../classes/User.php');

$timeStamp = date("Y-m-d H:i");
$userName = $_SESSION['username'];
$userId = $_SESSION['userId'];

$user = new User($timeStamp, $userName, $userId);

//Kicks user back to login if they do not have a session created
$user->kick_user();

function fetchRecipes(){
	$recipeArray = array();
	$sql = "SELECT * FROM recipes WHERE userId = '$user->userId' AND deleted IS NOT NULL";
	$query = mysqli_query($conn, $sql);
	$numrows = mysqli_num_rows($query);
	if($numrows > 0 ){
		while($recipes = mysqli_fetch_array($query)){
			$recipeId = $recipes['id'];
			$recipeName = $recipe['name'];
			$array = array('id' => $recipeId, 'name' => $recipeName);
		}
		array_push($recipeArray, $array);
	}
	return $recipeArray;
}
function displayRecipesRecent($arr){
	//Dsiplaying 10 most recent recipes (need to include tracker for recency), full list will appear elsewhere.
	//Want to display as picture on the right, with title, prep time, cook time, allergies, description on left.
	return '<table></table>';
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

  <div class="standard timeout">
    <h2>Welcome <?php echo $userName; ?> </h2>
    <p>What's for dinner tonight?</p>
	</div>
	<div class="standard">
		<?php
			//Checks if user has any recipes and prompts them to create one if not
			$user->check_new_user();
			//Display Content
			$recipes = fetchRecipes();
			echo displayRecipesRecent($recipes);
		?>
  </div>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
</body>
</html>
