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

  $_SESSION["pg_conn"] = $pg_conn;
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
        <div class="row center" id="center3">
          <h2 class="subtitle">Yummy</h2>
          <div class="col-md-6 col-md-offset-3 center-middle">
            <?php
            $id = $_GET['id'];
            $recipes = pg_query($pg_conn,
                                "SELECT id, name, description, photo_name, author_id
                                FROM recipe
                                WHERE id = '$id'
                                LIMIT 1");
            $author = pg_query($pg_conn, "SELECT name FROM author 
                                WHERE id = (SELECT author_id
                                FROM recipe
                                WHERE id = '$id'
                                LIMIT 1)");
            $steps = pg_query($pg_conn, "SELECT direction, step_order
                                        FROM step
                                        WHERE recipe_id='$id'
                                        ORDER BY step_order");

            $row = pg_fetch_array($recipes);
            echo "<div class='col-md-12'>";
            echo "<img class='img-responsive' src='../photos/rookie_cook/recipes/$row[3]'>";
            echo "<span style='font-weight: bold;'>$row[1]</span>";
            echo "<br>";
            echo "Author {$author[0]}";
            echo "<br />\n";
            echo $row[2];
            echo "</div>";

            echo "<br><span style='font-weight: bold;'>DIRECTIONS</span>";
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
