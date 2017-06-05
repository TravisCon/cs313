<script src="script.js"></script>
<div class="row" id="header">
  <div class="col-md-8 col-md-offset-2
              col-sm-8 col-xs-12">
    <a href="home.php">
      <h2 class="link" id="title">Rookie Cook</h2>
    </a>
    <h2 id="subtitle">
      <?php 
      echo $currentPage;
      ?>
    </h2>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-12">
    <?php
    $userName = $_SESSION["userName"];
    if (isset($userName)){
      echo "<div class='account'>";
      echo "<a href='account.php' class='link2'>";
      echo "<h2 class='welcome' id='userName'>";
      echo "Welcome</h2>";
      echo "<h2 id='username'>{$userName}</h2></a>";
      echo "<form action='logout.php'>";
      echo "<button class='btn btn-default' type='submit'>Logout</button>";
      echo "</form>";
      echo "</div>";
    } else {
      echo '<div class="col-xs-12 account">';
      echo '<div class="col-md-12 col-xs-6">';
      echo '<a href="register.php">';
      echo '<h2 class="link loginTitle">Register</h2>';
      echo '<br></a></div>';
      echo '<div class="col-md-12 col-xs-6">';
      echo '<a href="login.php">';
      echo '<h2 class="link loginTitle">Login</h2>';
      echo '</a></div></div>';
    }
    ?>
  </div>
</div>
