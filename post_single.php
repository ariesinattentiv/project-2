<?php
session_start();
require_once("dbconnections.php");
// With help from Thanh Vu on image display

$imgPaths; # Array for image paths
try
{
  $id = $_GET['id'];
  $stmt = $db->query("SELECT * FROM travelpost WHERE PostID=$id");
  $post = $stmt->fetch();
  $message = $post['Message'] ?? ""; // Blank default message
  $result = $db->query("SELECT UserName FROM `traveluser` WHERE UID=$post[UID]");
  $user = $result->fetch();
  $result = $db->query("SELECT FirstName, LastName FROM `traveluserdetails` WHERE UID=$post[UID]");
  $name = $result->fetch();

  $stmt = $db->query("SELECT ImageID FROM `travelpostimages` WHERE PostID=$id");
  
  while ($row = $stmt->fetch())
  {
    $imgIDs[] = $row['ImageID'];
  }
  foreach ($imgIDs as $img)
  {
    $stmt = $db->query("SELECT Path FROM `travelimage` WHERE ImageID=$img");
    while ($row = $stmt->fetch()){
      $imgPaths[] = $row['Path'];
    }
  }
  
}
catch(PDOException $e) 
{
  header("Location: error.php?error=Connection failed: ". $e->getMessage());
}


//$result = $db->query("SELECT `Path` FROM `travelimage` WHERE ImageID=$id");
//$imgPaths = $result->fetch(); 

// $imgPaths; # Array for image paths
// foreach ($imgIDs as $img){
//   try 
//   {
//     $stmt = $db->query("SELECT `Path` FROM `travelimage`");

//     while ($row = $stmt->fetch()){
//       $imgPaths[] = $row['Path'];
//     }
    
//   } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
//   }
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; 
 charset=UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Travel Journal</title>

 <link rel="shortcut icon" href="../../assets/ico/favicon.png">

 <!-- Google fonts used in this theme  -->
 <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>  

 <!-- Bootstrap core CSS -->
 <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Bootstrap theme CSS -->
 <!-- <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet"> -->


 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
 <![endif]-->
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container">
   <div class="row">  <!-- start main content row -->

    <div class="col-md-2">  <!-- start left navigation rail column -->
     <?php include 'side.php'; ?>
   </div>  <!-- end left navigation rail --> 

   <div class="col-md-10">  <!-- start main content column -->

     <!-- Customer panel  -->
    <div class="panel panel-danger spaceabove">           
     <div class="panel-heading"><h3><?php echo $post['Title']?></h3></div>
     <div class="panel-body">
      <div class="row">
        <div class="col-md-9"><?php echo $message?></div>
        
        <div class="col-md-3">
         <div class="panel panel-primary">
          <div class="panel-heading"><h4>Post Details</h4></div>

          <ul class="list-group">
            <li class="list-group-item"><strong>Date: </strong> 
              <?php echo date('F d, Y', strtotime($post['PostTime']))?>
            </li>
            <li class="list-group-item"><strong>Posted By: </strong> 
              <?php echo $name['FirstName']." ".$name['LastName'] ?>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>           

<div class="panel panel-danger spaceabove">           
 <div class="panel-heading"><h4>Travel images for this post</h4></div>
 <div class="panel-body">
  <div class="row">
  <?php
    for ($x = 0; $x < sizeof($imgIDs); $x++){
      echo "
          <div class='col-md-3 text-center'>
        <div class='thumbnail'>
          <a href='image.php?id=$imgIDs[$x]'>
            <img src='images/square-medium/$imgPaths[$x]' alt='...' class='img-thumbnail'>
          </a>
          <div class='caption'>
            <p> <a href='image.php?id=$imgIDs[$x]'>Image Title</a></p>
            <p> 
              <a href='image.php?id=$imgIDs[$x]' class='btn btn-info' role='button'>
                <span class='glyphicon glyphicon-info-sign'></span> view
              </a>
            </p>
          </div>
        </div>
      </div>
      ";
    }
  ?>
  <!-- <div class="col-md-3 text-center">
    <div class="thumbnail">
      <a href="image.php?id=1">
        <img src="images/square-medium/6114859969.jpg" alt="..." class="img-thumbnail">
      </a>
      <div class="caption">
        <p> <a href="image.php?id=1">Image Title</a></p>
        <p> 
          <a href="image.php?id=1" class="btn btn-info" role="button">
            <span class="glyphicon glyphicon-info-sign"></span> view
          </a>
        </p>
      </div>
    </div>
  </div> -->
</div>
</div>
</div> 

</div>


</div>  <!-- end main content column -->
</div>  <!-- end main content row -->
</div>   <!-- end container -->





 <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
   <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
 </body>
 </html>

<?$db = null;?>