<?php
session_start(); include('db/config.php');
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "SELECT * FROM users Where username='$username' AND password='$password'";
$query = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($query);
if ($numrows > 0) {
	while($result = mysqli_fetch_array($query)){
		$_SESSION['username']=$result['username'];
		$_SESSION['password']=$result['password'];
		$_SESSION['permissions']= $result['permissions']; 
		header("Location:in/mainDash.php"); 
		exit; // <- don't forget this!
	}
}
mysqli_close($conn);

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
	setTimeout("$('.feedback').slideUp()", 5000); 
</script>
</head>

<body>  

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<div class="jumbotron ">
  			<div class="container">
				<h1 class="display-4">Log In</h1>
					<hr class="my-4">
						<p><span class="error">* required field</span></p>  
						  User Name: <input type="text" class="form_control" name="username" placeholder="username">
						  <span class="error">* <?php echo $usernameErr;?></span>
						  <br><br>
						  Password: <input type="password" name="password" placeholder="password">
						  <span class="error">* <?php echo $passwordErr;?></span>
						  <br><br>
						  <button type="button" name="login" id="login">Log In</button>
						   
			</div>
		</div>
	</div>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
<script>
$( document ).ready(function() {
	$('#login').('click', function(){
		console.log('here');
	});
});
</script>
</html>
