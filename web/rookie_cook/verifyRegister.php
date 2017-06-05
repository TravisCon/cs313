<?php
session_start();
require "db_connect.php";

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$email  = $_POST["email"];
$userName = $_POST["userName"];
$password = $_POST["password"];
$passHash = password_hash($password, PASSWORD_DEFAULT);

$userExists = pg_query($pg_conn,
                       "SELECT EXISTS
                       (SELECT true FROM author 
                       WHERE username = '$userName')");
$row = pg_fetch_row($userExists);
$userExists = (bool)($row[0] === "t");

$emailExists = pg_query($pg_conn,
                        "SELECT EXISTS
                        (SELECT true FROM author 
                        WHERE email = '$email')");
$row = pg_fetch_row($emailExists);
$emailExists = (bool)($row[0] === "t");

if (!$userExists && !$emailExists){
  $insertResult = pg_query($pg_conn,
                           "INSERT INTO author
                           (username, pass, email, validated)
          VALUES ('$userName', '$passHash', '$email', true)
          RETURNING id");
  $row = pg_fetch_row($insertResult);
  $id = $row[0];
}

if ($userExists){
  header("Location: register.php?userName=$userName");
} else if ($emailExists) {
  header("Location: register.php?email=$email");
} else {
  $_SESSION["userName"] = $userName;
  $_SESSION["id"] = $id;
  header("Location: home.php");
}
exit();
?>