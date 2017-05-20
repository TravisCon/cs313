<?php
include_once "item.php";
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
            We're sorry, this feature is not yet functional
            <br>
            <?php 
              $search = $_GET['search'];
              echo $search;
            ?>
          </div>
        </div>

      </div>
    </div>
  </body>

</html>
