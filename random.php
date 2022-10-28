<?php
require_once("dbconnections.php");

$random_post;
$random_img;
try {
  $stmt = $db->query("SELECT PostID FROM `travelpost`");

  while ($row = $stmt->fetch()){
     $random_post[] = $row['PostID'];
  }
  $stmt = $db->query("SELECT ImageID FROM `travelimage`");

  while ($row = $stmt->fetch()){
     $random_img[] = $row['ImageID'];
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

shuffle($random_post);
shuffle($random_img);
// Last thing to do, closes connection
$db = null;

?>