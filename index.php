<?php
session_start(); include('db/config.php');
$timeStamp = date("Y-m-d H:i");
$username = $password = '';
//Log In Existing User
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['username'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM users Where username='$username' AND password='$password'";
			$query = mysqli_query($conn, $sql);
			$numrows = mysqli_num_rows($query);
			if ($numrows > 0) {
				$updatesql = "UPDATE users SET lastLogin = '$timeStamp' WHERE username='$username' AND password='$password'";
				$updatequery = mysqli_query($conn, $updatesql);
				$_SESSION['username']=$username;

				$sql2 = "SELECT id FROM users Where username='$username' AND password='$password'";
				$query2 = mysqli_query($conn, $sql2);
				while($result = mysqli_fetch_array($query2)){
					$_SESSION['userId'] = $result['id'];
				}
				header("Location:in/mainDash.php");
				exit;
			}
			else{
					echo '<div class="alert alert-danger message">Username/Password is not correct</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger message">Username/Password field cannot be blank</div>';
		}
	}
}
//Create User
if(isset($_POST['register']) ){
		$userName = $_POST['usernameSignUp'];
    $password = $_POST['passwordSignUp'];
		echo $sql = "INSERT INTO users (username,password, lastLogin) VALUES ('$userName','$password','$timeStamp') ";
		$result = mysqli_query($conn, $sql);
    if((!$result) && ($result->num_rows === NULL)){
			die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }

    header("location: :in/mainDash.php");
	exit();
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
.jumbotron{
	height: 100%;
	bottom: 0;
}
.jumbotron-fluid {
	background-color: grey;
	height: 100%;
}
</style>
<!-- To set the alert from an unsuccesful login to disappear-->
<script>
	setTimeout("$('.message').slideUp()", 2000);
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
						  <button type="submit" name="login" id="login">Log In</button>
						</form>
						<button type="button" name="register" id="register" data-toggle="modal" data-target="#registerModal">Register</button>
			</div>
		</div>
	</div>
</div>

<!-- Register User Modal-->
<div class="modal fade" id="registerModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register Account</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
        <fieldset>

              <label class="col-md-4 control-label" for="textinput">New User</label>
            <div class="form-group">
              <div class="col-md-8">
              <input name="usernameSignUp" id="usernameSignUp" type="text" placeholder="Username" class="form-control input-md" required>
              <span class="help-block">Required</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Password to be issued</label>
              <div class="col-md-8">
              <input name="passwordSignUp" id="passwordSignUp" type="text" placeholder="Password" class="form-control input-md" required>
              </div>
            </div>
        </fieldset>
      </div>
      <div class="modal-footer">
        <a href="question_review.php" class="btn btn-default" >Close</a>
        <button type="submit" name="register" value="1" class="btn btn-primary">Confirm Details</button>
      </div>

        </form>
    </div>
  </div>
</div>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
<script>
$( document ).ready(function() {
	$(document).on("click", "#register", function () {
			$('#registerModal').show();
	});
});
</script>
</html>
