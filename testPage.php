<?php
session_start(); include('db/config.php');
include('classes/User.php');

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$timeStamp = date("Y-m-d H:i");
//$userName = $_SESSION['username'];
//$userId = $_SESSION['userId'];

$serviceUser = new ServiceUser($conn, $timeStamp, 'John Smith', '2');

//echo $serviceUser->get_time();
//echo $serviceUser->get_name();
//echo $serviceUser->get_id();

//$serviceUser->delete_account();
//echo $serviceUser->get_name();


if(isset($_POST['register']) ){
		$userName = $_POST['usernameSignUp'];
    $password = $_POST['passwordSignUp'];
		$accUtil = new AccUtilities($conn, $timeStamp);
		$accUtil->create_new_user($userName, $password);
    header("location: in/mainDash.php");
	exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<style>
</style>
</head>

<body>
</body>
</html>
