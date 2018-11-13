<?php
class ServiceUser{
  public $timestamp;
  public $userName;
  public $userId;
  public $conn;

  public function __construct($conn, $ts, $un, $uId){
    $this->conn = $conn;
    $this->timestamp = $ts;
    $this->userName = $un;
    $this->userId = $uId;
  }
  public function __destruct(){
    $this->conn = $conn;
    $this->timestamp = $ts;
    $this->userName = $un;
    $this->userId = $uId;
  }

  function get_time(){
    return $this->timestamp;
  }
  function get_name(){
    return $this->userName;
  }
  function get_id(){
    return $this->userId;
  }

  function kick_user(){
    if($this->userId === NULL){
    	header("Location:http://localhost/HomeChef/index.php");
    	exit;
    }
  }

  function check_new_user(){
    $sql = "SELECT * FROM recipes WHERE userId = '$this->userId' AND deleted IS NULL";
    $query = mysqli_query($this->conn, $sql);
    $numrows = mysqli_num_rows($query);
    if($numrows > 0 ){
      return 'Welcome Back';
    }
    else{
      return '<p> It appears you have not added any recipes just yet. </p> <a href="allRecipes.php">Click Here to Start!</a> ';
    }
  }
  
  function authenticate_user($username, $password){
    if(!empty($username) && !empty($password)){
      $sql = "SELECT username,password FROM users Where username='$username' AND password='$password'";
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
  function create_new_user($userName, $password){
    $sql = "INSERT INTO users (username,`password`, lastLogin, `permissions`) VALUES ('$userName','$password','$timeStamp', '2') ";
		$result = mysqli_query($conn, $sql);
    if((!$result) && ($result->num_rows === NULL)){
			die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
  function update_name($newName){
    $sqlUpdateName = "UPDATE users SET username='$newName', updated='$this->timestamp' WHERE id='$this->userId";
    $queryUpdateName = mysqli_query($this->conn, $sqlUpdateName);
    if((!$queryUpdateName)){
			die( "Data was not updated. Please try again later. <a href='index.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
  function update_password($newPass){
    $sqlUpdatePass = "UPDATE users SET `password`='$newPass', updated='$this->timestamp' WHERE id='$this->userId";
    $queryUpdatePass = mysqli_query($this->conn, $sqlUpdatePass);
    if((!$queryUpdatePass)){
			die( "Data was not updated. Please try again later. <a href='index.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
  function delete_account(){
    $sqlDelete = "UPDATE users SET deleted='$this->timestamp', deletedBY='$this->userId' WHERE id='$this->userId";
    $queryDelete = mysqli_query($this->conn, $sqlDelete);
    if((!$queryDelete)){
			die( "Data was not updated. Please try again later. <a href='index.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
}
?>
