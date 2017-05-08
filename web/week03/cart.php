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
            $currentPage = "Shopping Cart";
            include "header.php";
        ?>
                    <div class="row" id="center">
                        <div class="col-md-12" id="center-middle">
                            <div class="row">
                                <?php
                                if (isset($_SESSION['plants'])){
                                    $plants = $_SESSION['plants'];
                                    $total = 0;
                                    foreach ($plants as $plant){
                                        if ($plant->quantity > 0){
                                        $plant->displayCart();
                                        $total += $plant->quantity * $plant->price;
                                        }
                                    }
                                    $_SESSION['total'] = $total;
                                    if ($total == 0)
                                    {
                                        echo "<h2>Your Cart is Empty</h2>";
                                    }
                                } else {
                                    echo "<h3>Error</h3>";
                                }
                          ?> </div>
                            <div class="row">
                                <a href="browse.php">
                                    <div class="col-xs-4 submit">
                                        <h2>Back to Shopping</h2> </div>
                                </a>
                                <div class="col-xs-4" id="total_price">
                                    <?php
                                    printf ("<h2>Total: $%.2f</h2>", $total);
                                    ?>
                                </div>
                                <a href="checkout.php" >
                                    <div class="col-xs-4 submit" <?php if($total == 0.0){echo "hidden";} ?>>
                                        <h2>Proceed to Checkout</h2> </div>
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