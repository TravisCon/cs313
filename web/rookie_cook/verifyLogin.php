<?php
session_start();
require "db_connect.php";

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$userName = $_POST["userName"];
$password = $_POST["password"];

$passHash = password_hash($password, PASSWORD_DEFAULT);

$result = pg_query($pg_conn,
                   "SELECT pass FROM author
                   WHERE username = '$userName'");

$row = pg_fetch_row($result);
$validLogin = password_verify($password, $row[0]);

if ($userName == "Travis") {
  $result = pg_query($pg_conn,
                     "SELECT EXISTS
                     (SELECT true FROM author 
                     WHERE (username = '$userName'
                     AND pass = '$password'))");
  $row = pg_fetch_row($result);
  $validLogin = (bool)($row[0] === "t");
}

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