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
          <h2 class="subtitle">Register</h2>
          <div class="col-md-6 col-md-offset-3 center-middle">
            <?php 
            if (isset($_GET["userName"])) {
              echo "<div class='error'>Username is in use<br></div>";
            }
            if (isset($_GET["email"])) {
              echo "<div class='error'>Email is in use<br></div>";
            }
            ?>
            <form action="verifyRegister.php" method="post" id="registerForm">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="userName" required>
              </div>
              <div class="form-group password">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="pass1" required>
              </div>
              <div class="form-group password">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirmPass" id="pass2" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <div class="error" id="passError" hidden>Passwords do not match</div>
              <button type="submit" class="btn btn-default" id="submit">Register</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </body>

</html>
