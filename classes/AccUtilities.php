<?php
session_start();
class AccUtilities{
  public $timestamp;
  public $conn;

  public function __construct($conn, $ts){
    $this->conn = $conn;
    $this->timestamp = $ts;
  }
  public function __destruct(){
    $this->conn = $conn;
    $this->timestamp = $ts;
  }

  function authenticate_user($username, $password){
    if(!empty($username) && !empty($password)){
      $sql = "SELECT username,password FROM users Where username='$username' AND password='$password'";
      $query = mysqli_query($this->conn, $sql);
      $numrows = mysqli_num_rows($query);
      if ($numrows > 0) {
        $updatesql = "UPDATE users SET lastLogin = '$this->timestamp' WHERE username='$username' AND password='$password'";
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

  function create_new_user($userName, $password){
    $sql = "INSERT INTO users (username,`password`, lastLogin, `permissions`) VALUES ('$userName','$password','$this->timestamp', '2') ";
		$result = mysqli_query($this->conn, $sql);
    if((!$result) && ($result->num_rows === NULL)){
			die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
}
?>
