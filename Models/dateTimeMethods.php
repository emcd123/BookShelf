<?php
class dateTimeMethods{
  public $timestamp;
  public $userName;
  public $userId;
  public $conn;

  public function __construct($conn,$ts, $un, $uId){
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

  //Convert a integer into hours:minutes
  function convertToHoursMins($time, $format = '%02d:%02d') {
  	if ($time < 1) {
  		return;
  	}
  	$hours = floor($time / 60);
  	$minutes = ($time % 60);
  	return sprintf($format, $hours, $minutes);
  }

  // take a time in hours:minutes format and change to minutes
  function inMinutes($time2){
  	$dStart = strtotime($time2);
  	$dFinish = strtotime("00:00");

  	$hours = floor($dStart / 3600);
  	$minutes = floor(($dStart / 60) % 60);
  	//if($minutes < 10){$minutes = '0'.$minutes;}
  	$minutes1 = ($hours*60) + $minutes;

  	$hours = floor($dFinish / 3600);
  	$minutes = floor(($dFinish / 60) % 60);
  	//if($minutes < 10){$minutes = '0'.$minutes;}
  	$minutes2 = ($hours*60) + $minutes;

  	return $minutes1 - $minutes2;
  }
}
?>
