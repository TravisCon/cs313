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
    $currentPage = "Shipping and Payment Information";
        include "header.php";
                ?>
                <div class="row" id="center">
                    <div class="col-md-12" id="center-middle">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <form action="confirm.php" method="post" id="form"> Name
                                    <br>
                                    <input type="text" class="form-control" name="name">
                                    <br> Address
                                    <br>
                                    <input type="text" class="form-control" name="street" placeholder="Street Address">
                                    <br>
                                    <input type="text" class="form-control" name="city" placeholder="City">
                                    <br>
                                    <input type="text" class="form-control" name="state" placeholder="State">
                                    <br>
                                    <input type="number" class="form-control" name="zip" placeholder="ZIP code">
                                    <br> I-Number
                                    <br>
                                    <input type="text" class="form-control" name="i-number" maxlength="9" placeholder="224445555"> </form>
                            </div>
                        </div>
                        <div class="row">
                            <a href="cart.php">
                                <div class="col-xs-4 submit">
                                    <h2>Back to Cart</h2> </div>
                            </a>
                            <div class="col-xs-4" id="total_price">
                                <?php
                                printf ("<h2>Total: $%.2f</h2>", $_SESSION['total']);
                                ?> </div>
                            <div class="col-xs-4 submit" id="confirm">
                                <h2>Confirm Purchase</h2> </div>
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