<?php
session_start(); include('../db/config.php');
$timeStamp = date("Y-m-d H:i");
$username = $_POST['username'];
$password = $_POST['password'];
$authorisation = 'false';

$sql = "SELECT * FROM users Where username='$username' AND password='$password'";
$query = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($query);
if ($numrows > 0) {
	$updatesql = "UPDATE users SET lastLogin = '$timeStamp' WHERE username='$username' AND password='$password'";
	$updatequery = mysqli_query($conn, $updatesql);
	$authorisation = 'true';
	echo $authorisation;
	exit;
}
echo $authorisation;
exit;
?>
