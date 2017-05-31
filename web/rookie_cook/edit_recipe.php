<?php
session_start();
require "db_connect.php";

$recipeId = $_REQUEST["recipeId"];

$recipes = pg_query($pg_conn,
                    "SELECT id, name, description, photo_name,  author_id
                    FROM recipe
                    WHERE id = '$recipeId'");
$recipe = pg_fetch_array($recipes);

$steps = pg_query($pg_conn, "SELECT direction, step_order
                   FROM step
                   WHERE recipe_id='$recipeId'
                   ORDER BY step_order");

$ingredients = pg_query($pg_conn, "SELECT name, quantity, notes, brand
                   FROM ingredient
                   WHERE recipe_id='$recipeId'");

echo "<form action='verifyEdit.php' method='post'>";

echo "<br><span style='font-weight: bold;'>INGREDIENTS</span><br>";
while ($row = pg_fetch_row($ingredients)) {
  echo "<div class='col-md-6'>";
  echo "Quantity"; 
  echo "<input type='text' value='$row[1]'><br>";
  echo "Item";
  echo "<input type='text' value='$row[0]'>";
  echo "</div>";
}

echo "<br><br><span style='font-weight: bold;'>DIRECTIONS</span><br>";
while ($row = pg_fetch_row($steps)) {
  echo "<div class='col-md-12'>";
  echo "<span style='font-weight: bold;'>".$row[1]."</span> ".$row[0];
  echo "<br />\n";
  echo "</div>";
}

echo "</form>";
?>