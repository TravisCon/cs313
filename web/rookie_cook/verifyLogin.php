<?php
session_start();
require "db_connect.php";

$userName = $_POST["userName"];
$password = $_POST["password"];

$validLogin = pg_query($pg_conn,
                       "SELECT EXISTS
         (SELECT true FROM author WHERE (username = '$userName'
                                  AND pass = '$password'))");
$row = pg_fetch_row($validLogin);
$validLogin = (bool)($row[0] === "t");

if ($validLogin) {
  $row = pg_fetch_row(pg_query($pg_conn,
                               "SELECT id FROM author 
         WHERE username = '$userName'"));
  $id = $row[0];
  $_SESSION["userName"] = $userName;
  $_SESSION["id"] = $id;
  header("Location: home.php"); 
} else {
  header("Location: login.php?error=true"); 
}
exit();
?>