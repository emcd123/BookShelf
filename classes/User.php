<?php
class User{
  public $timestamp;
  public $userName;
  public $userId;
  public function __construct($ts, $un, $uId){
    $this->timestamp = $ts;
    $this->userName = $un;
    $this->userId = $uId;
  }
  public function __destruct(){
    $this->timestamp = $ts;
    $this->userName = $un;
    $this->userId = $uId;
  }

  function kick_user(){
    if($this->userId === NULL){
    	header("Location:../index.php");
    	exit;
    }
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

  function check_new_user($conn){
    $sql = "SELECT * FROM recipes WHERE userId = '$this->userId' AND deleted IS NULL";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    if($numrows > 0 ){
      return 'Welcome Back';
    }
    else{
      return '<p> It appears you have not added any recipes just yet. </p> <a href="allRecipes.php">Click Here to Start!</a> ';
    }
  }
}
?>
