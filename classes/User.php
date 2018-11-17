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

  //Getters
  function get_time(){
    return $this->timestamp;
  }
  function get_name(){
    return $this->userName;
  }
  function get_id(){
    return $this->userId;
  }

  //Account Updating Methods
  function update_name($newName){
    echo $sqlUpdateName = "UPDATE users SET username='$newName', updated='$this->timestamp' WHERE id='$this->userId'";
    $queryUpdateName = mysqli_query($this->conn, $sqlUpdateName);
    if((!$queryUpdateName)){
			die( "Data was not updated. Please try again later. <a href='index.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
    else{
      $this->userName = $newName;
    }
  }
  function update_password($newPass){
    $sqlUpdatePass = "UPDATE users SET `password`='$newPass', updated='$this->timestamp' WHERE id='$this->userId'";
    $queryUpdatePass = mysqli_query($this->conn, $sqlUpdatePass);
    if((!$queryUpdatePass)){
			die( "Data was not updated. Please try again later. <a href='index.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
  function delete_account(){
    $sqlDelete = "UPDATE users SET deleted='$this->timestamp', deletedBY='$this->userId' WHERE id='$this->userId'";
    $queryDelete = mysqli_query($this->conn, $sqlDelete);
    if((!$queryDelete)){
			die( "Data was not updated. Please try again later. <a href='index.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
    else{
      $this->userName = '';
      $this->userId = '';

    }
  }
}
?>
