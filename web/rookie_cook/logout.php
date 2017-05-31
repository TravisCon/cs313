<?php
session_start();
//require "db_connect.php";

$_SESSION["userName"] = null;
$_SESSION["id"] = null;
header("Location: home.php");
exit();
?>
