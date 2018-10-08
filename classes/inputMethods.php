<?php
session_start(); include('../db/config.php');
class inputMethods{
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

  function searchArrayDates($date,$array) {
  	$keyArray = array();
  	foreach ($array as $key => $val) {
     if($val['date'] === $date) {
  	   array_push($keyArray, $key);
     }
    }
    return $keyArray;
  }

  function searchArray($id,$array) {
  	$keyArray = array();
  	foreach ($array as $key => $val) {
      if($val['id'] === $id) {
       array_push($keyArray, $key);
      }
    }
    return $keyArray;
  }

  function searchArrayOne($id,$array) {
     foreach ($array as $key => $val) {
  	   if($val['id'] === $id) {
  		  return "$key";
  		  break;
  	   }
     }
     return null;
  }

  function clean_inputHTMLJSON($data) {
	   $data = trim($data);
	   $data = addslashes($data);
	   //$data = htmlspecialchars($data);
	   return $data;
	}
}
?>
