<?php
class Recipe{
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
  function fetchRecipes(){
  	$recipeArray = array();
  	$sql = "SELECT * FROM recipes WHERE userId = '$user->userId' AND deleted IS NOT NULL";
  	$query = mysqli_query($conn, $sql);
  	$numrows = mysqli_num_rows($query);
  	if($numrows > 0 ){
  		while($recipes = mysqli_fetch_array($query)){
  			$id = $recipes['id'];
  			$name = $recipe['name'];
        $description = $recipe['description'];
        $region = $recipe['region'];
        $difficulty = $recipe['difficulty'];
        $spice = $recipe['spice'];
        $prepTime = $recipe['prepTime'];
        $cookTime = $recipe['cookTime'];

  			$array = array('id' => $recipeId, 'name' => $recipeName, 'description'=>$description, 'region'=>$region, 'difficulty'=>$difficulty, 'spice'=>$spice, 'prepTime'=>$prepTime, 'cookTime'=>$cookTime);
  		}
  		array_push($recipeArray, $array);
  	}
  	return $recipeArray;
  }
  function displayRecipesRecent($arr){
  	//Dsiplaying 10 most recent recipes (need to include tracker for recency), full list will appear elsewhere.
  	//Want to display as picture on the right, with title, prep time, cook time, allergies, description on left.
  	return '<table>
    <thead>
      <th>Name</th>
      <th>Description</th>
      <th>Region</th>
      <th>Difficulty</th>
      <th>Spice</th>
      <th>Prep Time</th>
      <th>Cook Time</th>
    </thead>
    <tfoot>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tfoot>
    <tbody>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tbody>
    </table>';
  }

  function add_recipe($arr, $flag, $conn){
    //name, description, prepTime, cookTime, region, difficulty, spice
    $name = $arr[0];
    $description = $arr[1];
    $prepTime = $arr[2];
    $cookTime = $arr[3];
    $region = $arr[4];
    $difficulty = $arr[5];
    $spice = $arr[6];

    echo $sqlAdd = "INSERT INTO recipes (createdBy, created, name, description, region, difficulty, spice, prepTime, cookTime)
              VALUES('$this->userId', '$this->timestamp', '$name', '$description', '$region', '$difficulty', '$spice', '$prepTime', '$cookTime')";
    $queryAdd = mysqli_query($conn, $sqlAdd);
  }
}

?>
