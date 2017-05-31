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
      echo "<h2 class=\"loginTitle link\" id=\"userName\">";
      echo "<a href=\"account.php\">";
      echo "Welcome <span id='username'>{$userName}</span>";
      echo '</a>';
      echo "</h2>";
      echo "<form action='logout.php'>";
      echo "<button class='btn btn-default' type='submit'>Logout</button>";
      echo "</form>";
    } else {
      echo '<div class="col-md-12 col-xs-6">';
      echo '<a href="register.php">';
      echo '<h2 class="link loginTitle">Register</h2>';
      echo '<br></a></div>';
      
      echo '<div class="col-md-12 col-xs-6">';
      echo '<a href="login.php">';
      echo '<h2 class="link loginTitle">Login</h2>';
      echo '</a></div>';
    }
    ?>
  </div>
</div>
