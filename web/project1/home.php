<?php
session_start();
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

  <?php
  function pg_connection_string_from_database_url() {
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
  }
  
  $pg_conn = pg_connect(pg_connection_string_from_database_url());
  //$pg_conn = pg_connect("dbname=postgres user=postgres password=cangetin");

  $_SESSION["pg_conn_url"] = $pg_conn;
  if (!$pg_conn){
    echo "PG_conn: An error occurred.\n";
    exit;
  }
  ?>
  <body class="container-fluid">
    <div class="row">
      <div class="col-md-12" id="body">
        <?php
        $currentPage = "Recipes by the people, for the people";
        include "header.php";
        ?>
        <div class="row center" id="center1">
          <h2 class="subtitle">Search a Recipe</h2>
          <div class="col-md-6 col-md-offset-3 center-middle">

            <form action="search.php" method="get">
              <div class="form-group">
                <label type="">Keywords (has to be literal strings at the moment)</label>
                <input type="text" class="form-control" name="search" id="search">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
          </div>
        </div>
        <div class="row center" id="center2">
          <h2 class="subtitle"> Recipe of the Month</h2>
          <div class="col-md-6 col-md-offset-3 center-middle">
            <?php
            $recipes = pg_query($pg_conn,
                                "SELECT id, name, description, photo_name
                                FROM recipe
                                WHERE name = 'Toast'");
            while ($row = pg_fetch_row($recipes)) {
              echo "<a href='recipe.php?id=".$row[0]."'>";
              echo "<div class='col-md-12'>";
              echo "<img class='img-responsive' src='../photos/rookie_cook/recipes/$row[3]'>";
              echo "<span style='font-weight: bold;'>$row[1]</span>";
              echo "<br />\n";
              echo $row[2];
              echo "</div>";
              echo "</a>";
            }
            ?>         
          </div>
        </div>
        <div class="row center" id="center3">
          <h2 class="subtitle">Newest Recipes</h2>
          <div class="col-md-12 center-middle">
            <?php

            $recipes = pg_query($pg_conn,
                                "SELECT id, name, description,
                                photo_name
                                FROM recipe
                                ORDER BY my_date
                                LIMIT 5");
            if (!$recipes) {
              echo "An error occurred.\n";
              exit;
            }
            while ($row = pg_fetch_row($recipes)) {
              echo "<a href='recipe.php?id=".$row[0]."'>";
              echo "<div class='col-md-4'>";
              echo "<img class='img-responsive' src='../photos/rookie_cook/recipes/$row[3]'>";
              echo "<span style='font-weight: bold;'>$row[1]</span>";
              echo "<br />\n";
              echo $row[2];
              echo "</div>";
              echo "</a>";
            }
            ?>

          </div>
        </div>

      </div>
    </div>
  </body>

</html>
