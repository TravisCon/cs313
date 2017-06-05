<?php
session_start();
require "db_connect.php";
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
        $currentPage = "Recipes by the people,<br> for the people";
        include "header.php";
        ?>
        <div class="row center" id="center1">
          <h2 class="subtitle">Search a Recipe</h2>
          <div class="col-md-6 col-md-offset-3 center-middle">

            <form action="search.php" method="get">
              <div class="form-group">
                <label type="">Keywords</label>
                <input type="text" class="form-control" name="search" id="search">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
          </div>
        </div>
        <div class="row center" id="center2">
          <h2 class="subtitle"> Recipe of the Month</h2>
          <div class="col-md-6 col-md-offset-3">
            <?php
            $recipes = pg_query($pg_conn,
                                "SELECT id, name, description, photo_name
                                FROM recipe
                                WHERE name = 'Toast'");
            $row = pg_fetch_row($recipes);
            echo "<div class='col-md-12'>";
            echo "<a href='recipe.php?id=".$row[0]."'>";
            echo "<div class='preview'>";
            echo "<img class='img-responsive img-rounded' src='../photos/rookie_cook/recipes/$row[3]'>";
            echo "<span style='font-weight: bold;'>$row[1]</span>";
            echo "<br />\n";
            echo $row[2];
            echo "</div>";
            echo "</a>";
            echo "</div>";
            ?>         
          </div>
        </div>
        <div class="row center" id="center3">
          <h2 class="subtitle">Newest Recipes</h2>
          <div class="col-md-12">
            <?php
            $recipes = pg_query($pg_conn,
                                "SELECT id, name, description,
                                photo_name
                                FROM recipe
                                ORDER BY my_date DESC
                                LIMIT 8");
            if (!$recipes) {
              echo "An error occurred.\n";
              exit;
            }
            while ($row = pg_fetch_row($recipes)) {
              echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
              echo "<a href='recipe.php?id=".$row[0]."'>";
              echo "<div class='col-md-12 preview'>";
              echo "<img class='img-responsive img-rounded' src='../photos/rookie_cook/recipes/$row[3]'>";
              echo "<span style='font-weight: bold;'>$row[1]</span>";
              echo "<br />\n";
              echo $row[2];
              echo "</div>";
              echo "</a>";
              echo "</div>";
            }
            ?>

          </div>
        </div>

      </div>
    </div>
  </body>

</html>
