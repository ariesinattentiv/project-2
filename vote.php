<?php 
session_start();
require_once("dbconnections.php");

try{
    if(isset($_POST['submit'])){
        $db->beginTransaction(); 
        $statement = $db->prepare("INSERT INTO `travelimagerating` (ImageID, Rating) VALUES (1, 2)"); 
        $statement->bindValue(1, $_GET['id']); 
        $statement->bindValue(2, $_GET['points']); 
        $statement->execute(); 
        $db->commit();
      }
    header("Location: image.php?id=".$_GET['id']);
}
catch(PDOException $e) {
    header("Location: error.php?error=Connection failed: ". $e->getMessage());
  }


$db = null;
?>



