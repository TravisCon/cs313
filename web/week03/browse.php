<?php
include_once "item.php";
session_start();
//session_unset();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>BYU-I Plant Shop</title>
        <link rel="stylesheet" type="text/css" href="cart_theme.css">
        <?php 
        include "head.php";
    ?>
    </head>

    <body class="container">
        <div class="row">
            <div class="col-md-12" id="body">
                <?php
            $currentPage = "Browse Items";
            include "header.php";
        ?>
                    <div class="row" id="center">
                        <div class="col-md-12" id="center-middle">
                            <div class="row">
                                <?php 
                                if (isset($_SESSION['plants'])){
                                    $plants = $_SESSION['plants'];
                                } else {
                                $juniper = new Item("Juniper Bonsai Tree", 7.99, "../photos/plants/bonsai_juniper.jpg", "Bring on the Zen");
                                $moneyTree = new Item("Money Tree", 15.99, "../photos/plants/money_tree.jpg", "More real than your girlfriend's weave");
                                $cactus = new Item("Cactus", 4.99, "../photos/plants/cactus.jpg", "Don't forget to water it, or do forget. Either way it'll live.");
                                $roses = new Item("Roses", 11.99, "../photos/plants/roses.jpg", "For that special someone... Mom");
                                $lily = new Item("Lily", 6.99, "../photos/plants/lily.jpg", "Please, consider the lillies");
                                $strawberry = new Item("Strawberries", 7.50, "../photos/plants/strawberry.png", "So sweet, all the bugs will eat them before you do");
                                $fern = new Item("Hanging Fern", 10.50, "../photos/plants/fern.jpg", "Looks great, until you stop watering them");
                                                               
                                $plants = array($juniper->name => $juniper, $moneyTree->name => $moneyTree, $cactus->name => $cactus, $roses->name => $roses, $lily->name => $lily, $strawberry->name => $strawberry, $fern->name => $fern);
                                $_SESSION['plants'] = $plants;
                                }
                                
                                foreach ($plants as $plant)    {
                                    $plant->displayBrowse();
                                }
                              ?>
                            </div>
                            <div class="row">
                                <a href="cart.php">
                                    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 submit">
                                        <h2>
                                        <?php
                                            if (isset($_SESSION['sum'])){
                                                echo $_SESSION['sum'];
                                            } else {
                                                echo 0;
                                            }
                                        ?>
                                        Items in Cart</h2> </div>
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