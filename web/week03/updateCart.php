<?php
include "item.php";
session_start();    

$itemName = $_GET["item"];
$quantity = $_GET["quantity"];

$_SESSION['sum'] += $quantity;
$_SESSION['plants'][$itemName]->quantity += $quantity;
//print_r($_SESSION['plants']);

if ($_GET['remove'] == 'true'){
header('Location: cart.php');    
} else {
header('Location: browse.php');
}
exit();
?>