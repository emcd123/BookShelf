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
  

  function get_name(){
    return $this->userName;
  }
}
$today = date('Y-m-d');
$user = new User($today, 'Owen', '1');

echo $user->get_name();
?>
