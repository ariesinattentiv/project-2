<?php 
session_start();
require_once("dbconnections.php");
// With assistance from Caroline Lamb
try{
    if(!empty($_GET['points']) && !empty($_GET['id'])){
        $db->beginTransaction(); 
        $statement = $db->prepare("INSERT INTO travelimagerating (ImageID, Rating) VALUES (?, ?)"); 
        $statement->bindValue(1, $_GET['id']); 
        $statement->bindValue(2, $_GET['points']); 
        $statement->execute(); 
        $db->commit();
      }
    header("Location: http://localhost/ga2/image.php?id=".$_GET['id']);
}
catch(PDOException $e) {
    header("Location: error.php?error=Connection failed: ". $e->getMessage());
  }


$db = null;
?>



