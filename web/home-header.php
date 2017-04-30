<div class="row" id="header">
    <div class="row">
        <?php 
    if ($currentPage==="profile"){
        echo '<div class="col-sm-2 col-xs-4"><img class="img-thumbnail" src="photos/formalSmall.jpg"></div>';
        echo '<div class="col-sm-10 col-xs-8">
                <p> 
                    <span id="title">Travis Confer<br></span>
                    <span id="subtitle">
                        Coder &middot; Cooker &middot; Rocker &middot; Outdoorsman &middot; Legend
                    </span>
                </p>
            </div>';
    } else {
        echo '<div class="col-sm-2 col-xs-4"><img class="img-thumbnail" src="photos/essay.jpg"></div>';
        echo '<div class="col-sm-10 col-xs-8"><p id="title">CS313 Assignments</p></div>';
    }
    ?> </div>
    <div class="row" id="nav">
        <div class="col-xs-6">
            <a href="profile.php">
                <div <?php if ($currentPage==="profile" ) {echo 'id="selected"';} else {echo 'id="unselected"';} ?> >
                    <p>Travis' Profile</p>
                </div>
            </a>
        </div>
        <div class="col-xs-6">
            <a href="assignments.php">
                <div <?php if ($currentPage==="assignments" ) {echo 'id="selected"';} else {echo 'id="unselected"';} ?> >
                    <p>Assignments</p>
                </div>
            </a>
        </div>
    </div>
</div>