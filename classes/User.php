<?php
class User{
  public $timestamp;
  public $userName;
  public $userId;

  /*
  public function __construct($timestamp, $username, $userId){
    $this->$timestamp = $timestamp;
    $this->$userName = $userName;
    $this->$userId = $userId;
  }
  public function __destruct(){
    $this->$timestamp = $timestamp;
    $this->$userName = $userName;
    $this->$userId = $userId;
  }*/

  function kick_user(){
    if($this->userId === NULL){
    	header("Location:../index.php");
    	exit;
    }
  }

  function get_name(){
    return $userName.' UGH';
  }
}
?>
