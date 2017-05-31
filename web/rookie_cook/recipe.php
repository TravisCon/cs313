<?php
session_start();
require "db_connect.php";

$id = $_GET['id'];
$recipes = pg_query($pg_conn,
                    "SELECT id, name, description, photo_name,  author_id
                    FROM recipe
                    WHERE id = '$id'
                    LIMIT 1");
$recipe = pg_fetch_array($recipes);

$author = pg_fetch_array(pg_query($pg_conn, 
                                  "SELECT userName FROM author 
                   WHERE id = (SELECT author_id
                   FROM recipe
                   WHERE id = '$id'
                   LIMIT 1)"));
$steps = pg_query($pg_conn, "SELECT direction, step_order
                   FROM step
                   WHERE recipe_id='$id'
                   ORDER BY step_order");

$ingredients = pg_query($pg_conn, "SELECT name, quantity, notes, brand
                   FROM ingredient
                   WHERE recipe_id='$id'");
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
        $currentPage = "Recipes by the people, for the people";
        include "header.php";
        ?>
        <div class="row center" id="center3">
          <?php 
          echo "<h2 class='subtitle'>{$recipe[1]}</h2>";
          ?>
          <div class="col-md-8 col-md-offset-2" id="full-recipe">
            <?php
            echo "<div class='col-md-12'>";
            echo "<img class='img-responsive img-rounded' src='../photos/rookie_cook/recipes/$recipe[3]'>";
            echo "Author: <span style='font-weight: bold;'>{$author[0]}</span>";
            echo "<br />\n";
            echo $recipe[2];
            echo "</div>";

            echo "<br><span style='font-weight: bold;'>INGREDIENTS</span>";
            while ($row = pg_fetch_row($ingredients)) {
              echo "<div class='col-md-12'>";
              echo "<span style='font-weight: bold;'>".$row[1]."</span> ".$row[0];
              echo "<br />\n";
              echo "</div>";
            }
            
            echo "<br><br><span style='font-weight: bold;'>DIRECTIONS</span>";
            while ($row = pg_fetch_row($steps)) {
              echo "<div class='col-md-12'>";
              echo "<span style='font-weight: bold;'>".$row[1]."</span> ".$row[0];
              echo "<br />\n";
              echo "</div>";
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </body>

</html>
