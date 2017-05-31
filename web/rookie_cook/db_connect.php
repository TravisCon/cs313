<?php
$pg_conn = pg_connect(
  "host=ec2-23-21-224-199.compute-1.amazonaws.com 
    dbname=d9mdep8e4omh1c
    user=xjlplnrrrfjeie  password=25a88b8352de159d5341972d0cda2c0d43dfad4bd75744b89ce71c0fa36a0434
    port=5432
    ");

if (!$pg_conn){
  echo "PG_conn: An error occurred.\n";
  exit;
}
?>