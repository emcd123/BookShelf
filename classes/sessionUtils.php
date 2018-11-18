<?php
session_start();
class SessionUtils{
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

  function kick_user($userId){
    if($userId === NULL){
    	header("Location:http://localhost/HomeChef/index.php");
    	exit;
    }
  }

  function kill_session(){
  	session_destroy();
  	session_unset();
  }

  function check_new_user($userId){
    $sql = "SELECT * FROM recipes WHERE userId = '$userId' AND deleted IS NULL";
    $query = mysqli_query($this->conn, $sql);
    $numrows = mysqli_num_rows($query);
    if($numrows > 0 ){
      return 'Welcome Back';
    }
    else{
      return '<p> It appears you have not added any recipes just yet. </p> <a href="allRecipes.php">Click Here to Start!</a> ';
    }
  }
}
