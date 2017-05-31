<?php
session_start();
require "db_connect.php";

$search = $_GET['search'];
$recipes = pg_query($pg_conn,
                    "SELECT id, name, description, photo_name
                    FROM recipe
                    WHERE lower(name) LIKE '%$search%'
                    LIMIT 5");
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
        $currentPage = "Results for '{$search}'";
        include "header.php";
        ?>
        <div class="row center" id="center1">
          <!--          <h2 class="subtitle">Search Results</h2>-->
          <div class="col-md8 col-md-offset-2 col-sm-12">
            <?php 
            if(pg_num_rows($recipes) < 1 || strlen($search) < 1){
              echo "<div class='center-middle'";
              echo "No results for <span style='font-weight: bold;'>\"{$search}\"</span>";
              echo "</div>";
            } else {
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
            } 
            ?>
          </div>
        </div>

      </div>
    </div>
  </body>

</html>
