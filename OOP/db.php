<?php 

define("DB_SERVER" ,"localhost");
define("DB_NAME" ,"ostoskori");
define("DB_USERNAME" ,"root");
define("DB_PASSWORD" ,"ukko123");

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli) {
  die("ERROR: connection failed: " . $mysqli->connect_error);
}
