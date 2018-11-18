<?php
class RecipeClient{
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

  /*********************************************************

  All CRUD methods for recipes table are in Recipe.

  Model contains only methods which do not affect the
  recipes db table.

  **********************************************************/
  function fetchRecipes($userId){
  	$recipeArray = array();
  	$sql = "SELECT * FROM recipes WHERE userId = '$userId' AND deleted IS NULL";
  	$query = mysqli_query($this->conn, $sql);
  	$numrows = mysqli_num_rows($query);
  	if($numrows > 0 ){
  		while($recipe = mysqli_fetch_array($query)){
  			$id = $recipe['id'];
  			$name = $recipe['name'];
        $description = $recipe['description'];
        $region = $recipe['region'];
        $difficulty = $recipe['difficulty'];
        $spice = $recipe['spice'];
        $prepTime = $recipe['prepTime'];
        $cookTime = $recipe['cookTime'];
  			$array = array('id' => $recipeId, 'name' => $name, 'description'=>$description, 'region'=>$region, 'difficulty'=>$difficulty, 'spice'=>$spice, 'prepTime'=>$prepTime, 'cookTime'=>$cookTime);
        array_push($recipeArray, $array);
  		}
    }
  	return $recipeArray;
  }

  function displayRecipesRecent($arr){
  	//Dsiplaying 10 most recent recipes (need to include tracker for recency), full list will appear elsewhere.
  	//Want to display as picture on the right, with title, prep time, cook time, allergies, description on left.
    //print_r($arr);
    $string = '';
    foreach($arr as $ele){
      $recipeName = $ele['name'];
      $region = $ele['region'];
      $description = $ele['description'];
      $str = '<div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-12"> '.$name.'</div>
                  <div class="col-lg-12"> '.$description.'</div>
                </div>
              </div>';
      $string = $string . $str;
    }
    return $string;
  	/*return '<table>
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
      <th>1</th>
      <th>2</th>
      <th>3</th>
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
    </table>';*/
  }
}
?>
