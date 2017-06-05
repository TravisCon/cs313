<?php
session_start();
require "db_connect.php";

$userName = $_SESSION["userName"];
$id = $_SESSION["id"];

if (is_null($userName)) {
  header("Location: login.php"); 
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="recipe_theme.css">
    <?php 
    include "head_links.php";
    ?>
  </head>
  <body class="container-fluid">
    <div class="row">
      <div class="col-md-12" id="body">
        <?php
        $currentPage = "Your Account";
        include "header.php";
        ?>
        <div class="row center" id="center1">
          <?php 
          $error = (isset($_GET['error']));
          ?>
          <h2 class="subtitle">Submit a recipe</h2>
          <button id="addRecipeButton" class="btn btn-default"
                  <?php if ($error) {echo " style='display: none;'";}?>
                  >Click to add a new recipe
          </button>
          <div class="col-md-8 col-md-offset-2 center-middle" id="newRecipeForm" 
               <?php if (!$error) {echo "hidden";}?> 
               >
            <form action="verifyRecipe.php" method="post" enctype="multipart/form-data" id="recipeForm">
              <div class="error" <?php if (!$error) {echo " hidden";}?>>Error processing request: Check image file</div>
              <div class="form-group">
                <label for="name">Recipe Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="description">Recipe Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Write a brief description of this recipe, and any side notes" required></textarea>
              </div>  
              <div class="row form-group">
                <div class="col-xs-12">
                  <label class="btn btn-default btn-block"> Upload photo (less than 1MB)
                    <br>
                    Drag Photo Here
                    <!--<span id="photoLabel"></span>-->
                    <input type="file" class="btn btn-primary btn-block" name="photoName" id="photoName" required>
                  </label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-xs-4">
                  <label>Total Time(minutes)</label>
                  <input type="number" class="form-control"
                         name="totalTime" maxlength="2" min="0" max="1000" required>
                </div>
                <div class="col-xs-4">
                  <label>Prep Time(minutes)</label>
                  <input type="number" class="form-control"  maxlength="2" min="0" max="1000" placeholder="Optional" name="prepTime">
                </div>
                <div class="col-xs-4">
                  <label>Cook Time(minutes)</label>
                  <input type="number" class="form-control"  maxlength="2" min="0" max="1000" placeholder="Optional" name="cookTime">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-xs-4 col-xs-offset-2">
                  <label>Calories</label>
                  <input type="number" class="form-control" maxlength="2" min="0" max="8000" placeholder="Optional" name="calories">
                </div>
                <div class="col-xs-4">
                  <label>Servings</label>
                  <input type="number" class="form-control"  maxlength="2" min="0" max="100" placeholder="Optional" name="servings">
                </div>
              </div>
              <hr>
              <div class="row form-group" id="ingredientsList">
                <div class="col-xs-8">
                  <label>Ingredient</label>
                  <input type="text" class="form-control" name="ingredient[0]" placeholder="Milk" required>
                </div>
                <div class="col-xs-4">
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="quantity[0]" placeholder="1 cup" required>
                </div>
              </div>
              <button id="addIngredient" class="btn btn-default" type="button">Add an Ingredient</button>
              <hr>
              <div class="row form-group" id="stepList">
                <label for="step[0]" class="col-xs-2 col-form-label"> Step 1</label>
                <div class="col-xs-10">
                  <input type="text" class="form-control" id="step[0]" name="step[0]" required>
                </div>
              </div>
              <button id="addStep" class="btn btn-default" type="button">Add a Step</button>
              <hr>
              <input class="btn btn-primary" id="recipeSubmit" type="submit" value="Submit Recipe">
            </form>
          </div>
        </div>
        <div class="row center" id="center2">
          <h2 class="subtitle">Your recipes</h2>
          <div class="col-md-12">
            <?php
            $recipes = pg_query($pg_conn,
                                "SELECT id, name, description,
                                photo_name
                                FROM recipe
                                WHERE author_id = '$id'
                                ORDER BY my_date
                                LIMIT 8");
            if (pg_num_rows($recipes) < 1) {
              echo "<div class=' col-md-12 center-middle'>";
              echo "You have no recipes";
              echo "</div>";
              exit();
            }            
            while ($row = pg_fetch_row($recipes)) {
              echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
              echo "<div class='col-md-12 preview'>";
              echo "<img class='img-responsive img-rounded' src='../photos/rookie_cook/recipes/$row[3]'>";
              echo "<span style='font-weight: bold;'>$row[1]</span>";
              echo "<br />\n";
              echo $row[2] . "<br>";
              echo "<form class='editRequest'>";
              echo "<input id='recipeId' name='recipeId' type='text' value='$row[0]' hidden>";
              echo "<button type='submit' class='btn btn-default edit'>Edit</button>";
              echo "<button type='button' class='btn btn-danger delete'>Delete</button>";
              echo "</form>";
              echo "</div>";
              echo "</div>";
            }
            ?>
          </div>
        </div>
        <div class="row center" id="center3" hidden>
          <h2 class="subtitle">Update Recipe</h2>
          <div class="col-md-12 center-middle" id="editBox">
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
