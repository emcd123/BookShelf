<?php
session_start();
include('db/config.php');
include('../classes/User.php');
include('../classes/recipeContent.php');
$timeStamp = date("Y-m-d H:i");
$userName = $_SESSION['username'];
$userId = $_SESSION['userId'];

$user = new User($timeStamp, $userName, $userId);
$recipe = new Recipe($timeStamp, $userName, $userId);
//Kicks user back to login if they do not have a session created
$user->kick_user();
$recipeArray = $recipe->fetchRecipes();
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
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script>
	//setTimeout("$('.timeout').slideUp()", 2000);
</script>
</head>
<body>
  <div class="topnav">
    <a class="active" href="mainDash.php">HomeShelf</a>
    <a class="user" href="#"> <?php echo $userName; ?> </a>
		<button type="button" class="btn btn-success btn-md" onclick="location.href='../index.php'" style="margin-top: 12px;"> Log Out </button>
  </div>
	<div class="sidenav">
		<a href="mainDash.php">DashBoard</a>
		<a href="allRecipes.php">Recipes</a>
		<a href="#">Ingredients</a>
		<a href="#">Meal Prep</a>
		<a href="#">Settings</a>
	</div>
	<div class="container standard">
	  <div class="row">
	    <div class="col-sm-10">
	      <i class="fa fa-angle-right"><a style="font-size:20px;" href="allRecipes.php">Recipes</a></i>
	    </div>
	    <div class="col-sm-2">
	      <button class="btn btn-primary btn-md pull-right" id="newRecipe" type="button">Add Recipe</button>
	    </div>
	  </div>
	</div>

	<!-- Add recipe -->
  <div class="modal fade" id="modalNewRecipe" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Recipe</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
				<form action="/action_page.php">
					<div class="modal-body">
					  Name: <input type="text" id="recipeName" value="Dish Name">
					  <br><br>
					  Description: <textarea id="recipedescription" value="..."></textArea>
						<br><br>
						<div> Spice:
							<input type="radio" id="mildSpice" class="spice" value="1">
							<label for="mildSpice">Mild</label>

							<input type="radio" id="mediumSpice" class="spice" value="2">
							<label for="mediumSpice">Medium</label>

							<input type="radio" id="hotSpice" class="spice" value="3">
							<label for="hotSpice">Hot</label>
						</div>
						<br><br>
						Prep Time(in minutes): <input type="text" id="recipePrepTime" value="10">
						<br><br>
						Cook Time(in minutes): <input type="text" id="recipeCookTime" value="20">
						<br><br>
						Region: <input type="text" id="recipeRegion" value="Italy">
						<br><br>
						Difficulty(1-10): <input type="text" id="recipeDifficulty" value="5">
        	</div>
        	<div class="modal-footer">
          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" id="addRecipe" class="btn btn-success">Save</button>
        	</div>
				</form>
      </div>
    </div>
  </div>
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script>
	$(document).on("click", "#newRecipe", function(){
		$("#modalNewRecipe").modal('show');
	});
	$(document).on("click", "#addRecipe", function(){
		if ($('input[class=spice]:checked').length > 0) {
			var spice = $('input[class=spice]:checked').val();
    	console.log(spice);
		}
	});
	</script>
	</body>
</html>
