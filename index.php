<?php
session_start(); include('db/config.php');
require('../vendor/autoload.php');

$timeStamp = date("Y-m-d H:i");
$username = $password = '';

if(isset($_POST['login'])){
	$sql = "SELECT * FROM users Where username='$username' AND password='$password'";
	$query = mysqli_query($conn, $sql);
	$numrows = mysqli_num_rows($query);
	if ($numrows > 0) {
		$updatesql = "UPDATE users SET lastLogin = '$timeStamp' WHERE username='$username' AND password='$password'";
		$updatequery = mysqli_query($conn, $updatesql);
	}			
	$_SESSION['username']=$username;
	//$_SESSION['password']=$password;
	header("Location:in/mainDash.php"); 
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 
<style>
.error {color: #FF0000;}

.jumbotron-fluid {
	background-color: grey;
}
</style>
<!-- To set the alert from an unsuccesful login to disappear-->
<script>
	//setTimeout("$('.feedback').slideUp()", 5000); 
</script>
</head>

<body>  
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<div class="jumbotron ">
  			<div class="container">
				<h1 class="display-4">Log In</h1>
					<hr class="my-4">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
						  <p><span class="error">* required field</span></p>  
						  User Name: <input type="text" id="username" class="form_control" name="username" placeholder="username">
						  <br><br>
						  Password: <input type="password" id="password" name="password" placeholder="password">
						  <button type="submit" name="login" id="login" value="Login">Log In</button>
						</form>
						   
			</div>
		</div>
	</div>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
<script>/*
$( document ).ready(function() {
	$(document).on("click", "#login", function () {
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		console.log(username);
		console.log(password);
		$.ajax({
			type: "POST",
			url: "ajax/authoriseLogin.php",
			data: {'username':username, 'password':password},
			success: function(data){
				console.log(data);
				if(data == 'true'){
					$('#credentials').val(data);				
				}
			},
			error: function(data){
			console.log('error');
			}				
		});
	});
});*/
</script>
</html>
