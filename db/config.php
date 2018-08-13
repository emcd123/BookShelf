<?php
$servername = "localhost";
$user = "root";
$pass = "root";
$dbname = "bookshelf";

// Create connection
$conn = mysqli_connect($servername, $user, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
 }


?>
