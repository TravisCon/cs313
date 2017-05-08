<?php
include "item.php";
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>BYU-I Plant Shop</title>
        <link rel="stylesheet" type="text/css" href="cart_theme.css">
        <?php include "head.php"
    ?>
    </head>

    <body class="container">
        <div class="row">
            <div class="col-md-12" id="body">
                <?php
            $currentPage = "Order Summary";
            include "header.php";
        ?>
                    <div class="row" id="center">
                        <div class="col-md-12" id="center-middle">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12"> Order Shipped To:
                                    <br>
                                    <?php
                                    foreach ($_POST as &$variable){
                                        $variable = htmlspecialchars($variable);
                                    }
                                        echo $_POST['name'].'<br>';
                                        echo $_POST['street'].'<br>';
                                        echo $_POST['city'].', '.$_POST['state'].' '.$_POST['zip'].'<br><br>';
                                        printf ("<h2>Total: $%.2f</h2>", $_SESSION['total']);
                                        ?>
                                </div>
                                <div class="col-sm-9 col-xs-12">
                                    <div class="col-xs-12" id="item_summary">
                                    <h2>Items Purchased</h2>
                                    <?php
                                if (isset($_SESSION['plants'])){
                                    $plants = $_SESSION['plants'];
                                    $total = 0;
                                    foreach ($plants as $plant){
                                        if ($plant->quantity > 0){
                                        $plant->displayReceipt();
                                        $plant->quantity = 0;
                                        }
                                    }
                                    $_SESSION['plants'] = $plants;
                                    $_SESSION['total']= 0.0;
                                    $_SESSION['sum']=0;
                                
                                } else {
                                    echo "<h3>Error</h3>";
                                }
                                        ?> </div>
                                </div>
                            </div>
                            <div class="row">
                                <a href="browse.php">
                                    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 submit">
                                        <h2>
                                        Shop Some More!</h2> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="footer">
                            <h4><strong>Contact</strong></h4>
                            <p>Bloom Room at (208) 496 - 4599 /&nbsp;flowercenter@byui.edu</p>
                            <p>Plant Shop at (208) 496 - 4581 &nbsp;/ byuihorticulture@gmail.com</p>
                        </div>
                    </div>
            </div>
        </div>
    </body>

    </html>