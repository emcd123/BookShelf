<?php
session_start();
class CrudUtils{
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

/*********************************************************
Want to track all backend api calls to the db.
Add, Update, Delete

Want to INSERT to dbChange table all calls with associated userId
and the table affected.

This will allow the chance to see how the db is being changed,
will allow easier db input debugging.

**********************************************************/

  function insert_add($userId, $table){
    $sql = "INSERT INTO dbChange (type, userId, table, created) VALUES ('INSERT', '$userId', $table, '$this->timestamp')";
    $qeury = mysqli_query($this->conn, $sql);
    if(!$qeury){
			die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }

  function insert_update($userId, $table){
    $sql = "INSERT INTO dbChange (type, userId, table, created) VALUES ('UPDATE', '$userId', $table, '$this->timestamp')";
    $qeury = mysqli_query($this->conn, $sql);
    if(!$qeury){
			die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }

  function insert_delete($userId, $table){
    $sql = "INSERT INTO dbChange (type, userId, table, created) VALUES ('DELETE', '$userId', $table, '$this->timestamp')";
    $qeury = mysqli_query($this->conn, $sql);
    if(!$qeury){
			die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
}
