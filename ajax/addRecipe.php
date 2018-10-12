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

$recipeData = json_decode($_POST['recipeData']);
//print_r($recipeData);

//$recipe->add_recipe($recipeData, $flag, $conn);
$name = $recipeData[0];
$description = $recipeData[1];
$prepTime = $recipeData[2];
$cookTime = $recipeData[3];
$region = $recipeData[4];
$difficulty = $recipeData[5];
$spice = $recipeData[6];

$sqlAdd = "INSERT INTO recipes (createdBy, created, name, description, region, difficulty, spice, prepTime, cookTime)
          VALUES('$userId', '$timeStamp', '$name', '$description', '$region', '$difficulty', '$spice', '$prepTime', '$cookTime')";
$queryAdd = mysqli_query($conn, $sqlAdd);
 ?>
