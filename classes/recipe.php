<?php
class Recipe{
  public $timestamp;
  public $recipeId;
  public $conn;

  public function __construct($conn, $ts, $rId){
    $this->conn = $conn;
    $this->timestamp = $ts;
    $this->recipeId = $rId;
  }
  public function __destruct(){
    $this->conn = $conn;
    $this->timestamp = $ts;
    $this->recipeId = $rId;
  }

  function add_recipe($arr, $userId){
    //name, description, prepTime, cookTime, region, difficulty, spice
    $name = $arr[0];
    $description = $arr[1];
    $prepTime = $arr[2];
    $cookTime = $arr[3];
    $region = $arr[4];
    $difficulty = $arr[5];
    $spice = $arr[6];

    $sql = "INSERT INTO recipes (createdBy, created, name, description, region, difficulty, spice, prepTime, cookTime, userId)
              VALUES('$userId', '$this->timestamp', '$name', '$description', '$region', '$difficulty', '$spice', '$prepTime', '$cookTime', '$this->userId')";
    $query = mysqli_query($this->conn, $sql);
    if(!$qeury){
      die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
    else{
      return '<div class="alert alert-success"><strong>Success!</strong> Recipe Has Been Added</div>';
    }
  }

  function update_recipe($arr, $userId){
    $sql = "UPDATE recipes SET WHERE id='$this->recipeId' AND userId='$userId'";
    $query = mysqli_query($this->conn, $sql);
    if(!$qeury){
      die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }

  function delete_recipe(){
    $sql = "UPDATE recipes SET deleted='$this->timestamp', deletedBy='$userId' WHERE id='$this->recipeId'";
    $query = mysqli_query($this->conn, $sql);
    if(!$qeury){
      die( "Data was not updated. Please try again later. <a href='question_review.php'>Click here</a> to return to Home page.".mysqli_error($conn));
    }
  }
}

?>
