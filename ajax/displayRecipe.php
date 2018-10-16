<?php
session_start();
include('../db/config.php');
include('../classes/User.php');
include('../classes/recipeContent.php');

$timeStamp = date("Y-m-d H:i");
$userName = $_SESSION['username'];
$userId = $_SESSION['userId'];

$user = new User($timeStamp, $userName, $userId);
$recipe = new Recipe($timeStamp, $userName, $userId);
//Kicks user back to login if they do not have a session created
$user->kick_user();

$recipeArray = $recipe->fetchRecipes($conn);
//print_r($recipeArray);
echo $recipe->displayRecipesRecent($recipeArray, $conn);
?>
