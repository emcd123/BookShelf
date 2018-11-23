<?php
session_start();
include('../db/config.php');
include('../Models/User.php');
include('../Models/recipeContent.php');
$timeStamp = date("Y-m-d H:i");
$userName = $_SESSION['username'];
$userId = $_SESSION['userId'];

$user = new User($timeStamp, $userName, $userId);
$recipe = new Recipe($timeStamp, $userName, $userId);
//Kicks user back to login if they do not have a session created
$user->kick_user();

$recipeData = json_decode($_POST['recipeData']);
echo $recipe->add_recipe($recipeData, $conn);
 ?>
