<div class="row" id="header">
    <div class="col-md-12">
        <h1>Rocky Mountain Eats</h1> </div>
</div>
<div class="row" id="nav">
    <div class="col-xs-4" <?php if ($currentPage==="home" ) {echo 'id="selected"';} else {echo 'id="unselected"';} ?> >
        <div><a href="home.php">Home</a></div>
    </div>
    <div class="col-xs-4" <?php if ($currentPage==="about" ) {echo 'id="selected"';} else {echo 'id="unselected"';} ?> >
        <div><a href="about-us.php">About Us</a></div>
    </div>
    <div class="col-xs-4" <?php if ($currentPage==="login" ) {echo 'id="selected"';} else {echo 'id="unselected"';} ?> >
        <div><a href="login.php">Login</a></div>
    </div>
</div>