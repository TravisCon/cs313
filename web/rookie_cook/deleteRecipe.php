<?php
session_start();
require "db_connect.php";

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (is_null($_SESSION['userName'])){
  header("Location: login.php");
  exit(); 
}

$id = $_POST["recipeId"];


pg_query($pg_conn, "DELETE FROM step WHERE recipe_id = '$id'"); 
pg_query($pg_conn, "DELETE FROM ingredient WHERE recipe_id = '$id'");
pg_query($pg_conn, "DELETE FROM recipe WHERE id = '$id'");

header("Location: account.php");
exit();
?>