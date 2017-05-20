<script src="script.js"></script>
<div class="row" id="header">
  <div class="col-md-12">
    <a href="main.php">
      <h2 id="title">Rookie Cook</h2>
      <h2 id="subtitle">
        <?php 
        echo $currentPage;
        spl_autoload_register(function($className){
          require_once $className.".php"; 
        });
        ?>

      </h2>
    </a>
  </div>
</div>
