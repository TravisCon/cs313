<script src="script.js"></script>
<div class="row" id="header">
    <div class="col-md-12">
        <h2 id="title">BYU-I Plant Shop</h2>
        <h2 id="subtitle">
            <?php 
            echo $currentPage;
            spl_autoload_register(function($className){
                require_once $className.".php"; 
            });
                ?>
        </h2> </div>
</div>