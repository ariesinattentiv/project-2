<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travels";
// Double quotes interprets variables inside of it
// Single quotes takes every character literally as a string


try {
  $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  // echo "Connection failed: " . $e->getMessage();
  // die("Connection failed: " . $e->getMessage());
  header("Location: error.php?error=Connection failed: ". $e->getMessage());
  // instruction location allows redirection to another page
  // ?error create vaiable to pass
}
?>