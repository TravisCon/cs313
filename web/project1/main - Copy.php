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

  <body class="container">
    <div class="row">
      <div class="col-md-12" id="body">
        <?php
        $currentPage = "Preview Recipes";
        include "header.php";
        ?>
        <div class="row" id="center">
          <div class="col-md-12" id="center-middle">
            <div class="row">
              Content<br>
              <br>
              <br>
              <br>
              <br>
              <br>
              More Content
              <br>
              <br>
              <br>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" id="footer">
            Content
          </div>
        </div>
      </div>
    </div>
  </body>

</html>