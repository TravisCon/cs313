<?php
session_start();
require "db_connect.php";

if (is_null($_SESSION['userName'])){
  header("Location: login.php");
  exit();
}
$id = $_SESSION["id"];

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$photoDirectory = "../photos/rookie_cook/recipes/";
$photoFile = $photoDirectory . basename($_FILES["photoName"]["name"]);
$validFile = 1;
$fileType = pathinfo($photoFile, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["photoName"]["tmp_name"]);
if($check !== false) {
  echo "File is an image - " . $check["mime"] . ".";
  $validFile = 1;
} else {
  echo "File is not an image.";
  $validFile = 0;
}

//Check if file exists
if (file_exists($photoFile)) {
  echo "Sorry, file already exists.";
  $validFile = 0;
}

//Check size 600kb limit
if ($_FILES["photoName"]["size"] > 1000000) {
  echo "Sorry, your file is too large.";
  $validFile = 0;
}

//Check file extension type
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $validFile = 0;
}

// Check if $validFile is set to 0 by an error
if ($validFile == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photoName"]["tmp_name"], $photoFile)) {
    echo "The file ". basename( $_FILES["photoName"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$name  = $_POST["name"];
$photoName = basename($_FILES["photoName"]["name"]);
$description = $_POST["description"];
$totalTime = $_POST["totalTime"];
$prepTime = $_POST["prepTime"];
$cookTime = $_POST["cookTime"];
$calories = $_POST["calories"];
$servings = $_POST["servings"];
$ingredients = $_POST["ingredient"];
$quantities = $_POST["quantity"];
$steps = $_POST["step"];

$valid = true;
if (is_null($photoName) || is_null($ingredients) || is_null($steps)) {
  $valid = false;
}
  

if ($valid && $validFile) {
  $recipeInsert = pg_query($pg_conn,
           "INSERT INTO recipe(author_id, name, description, total_time, photo_name)
           VALUES ('$id', '$name', '$description', '$totalTime', '$photoName') RETURNING id");
  $row = pg_fetch_row($recipeInsert);
  $recipeId = $row[0];
  echo $recipeId;
  
  $ingredientQuery = "INSERT INTO ingredient(recipe_id, name, quantity) VALUES ";
  $size = sizeof($ingredients);
  for($i = 0; $i < $size; $i++){
    $temp = "('$recipeId', '$ingredients[$i]', '$quantities[$i]')";
    $ingredientQuery .= $temp;
    if ($i < ($size - 1))
      $ingredientQuery .= ',';
  }
  
  echo $ingredientQuery;
  pg_query($pg_conn, $ingredientQuery);
  
  $stepQuery = "INSERT INTO step(recipe_id, step_order, direction) VALUES ";
  $size = sizeof($steps);
  for($i = 0; $i < $size; $i++){
    $temp = "('$recipeId',".($i + 1).", '$steps[$i]')";
    $stepQuery .= $temp;
    if ($i < ($size - 1))
      $stepQuery .= ',';
  }
  echo $stepQuery;
  pg_query($pg_conn, $stepQuery);
  header("Location: account.php");
} else {
  header("Location: account.php?error=true");
}
exit();
?>