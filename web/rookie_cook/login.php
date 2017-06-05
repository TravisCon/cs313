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
        $currentPage = "Recipes by the people, for the people";
        include "header.php";
        ?>
        <div class="row center" id="center2">
          <h2 class="subtitle">Login</h2>
          <div class="col-md-6 col-md-offset-3 center-middle">
            <?php
            if (isset($_GET["error"])) {
              echo "<div class='error'>Incorrect username or password</div><br>";
            }
            ?>
            <form action="verifyLogin.php" method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="userName">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button type="submit" class="btn btn-default">Login</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </body>

</html>
