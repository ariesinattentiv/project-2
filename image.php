<?php
session_start();
require_once("dbconnections.php");
$id = $_GET['id'];
$result = $db->query("SELECT * FROM `travelimagedetails` WHERE ImageID=$id");
$photo=$result->fetch();
$result = $db->query("SELECT UID, Path FROM `travelimage` WHERE ImageID=$id");
$path=$result->fetch();
$result=$db->query("SELECT FirstName, LastName FROM `traveluserdetails` WHERE UID=$path[UID]");
$user=$result->fetch();
$result = $db->query("SELECT LocationName FROM `travelimagelocations` WHERE ImageID=$id");
$location = $result->fetch();
$result = $db->query("SELECT AVG(Rating) as RatingAvg, COUNT(Rating) as Votes FROM `travelimagerating` WHERE ImageID=$id");
$rating = $result->fetch();
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
       <div class="panel-heading"><h3><?php echo $photo['Title'] ?></h3></div>
       <div class="panel-body">

        <div class="row">
          <div class="col-md-9 text-center"> 
            <img src=<?php echo "images/medium/".$path['Path'] ?> alt="\...\" data-toggle="modal" data-target="#myModal">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><?php echo $photo['Title'] ?></h4>
                  </div>
                  <div class="modal-body text-center">
                    <img src=<?php echo "images/medium/".$path['Path'] ?> alt=\"...\"  class="img-thumbnail">
                    <br><br>
                    <?php if($photo['Description']!=""){?>
                        <p><strong><?php echo $photo['Description'] ?></strong></p>
                      <?php 
                      }
                      else{
                      ?>
                        <p><strong>No Image Description</strong></p>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Modal -->
            <br/> <br/>
            <?php if($photo['Description']!=""){?>
              <div class="well"><?php echo $photo['Description'] ?></div>
            <?php 
            }
            else{
            ?>
              <div class="well">No Image Description</div>
            <?php } ?>
          </div>
          <div class="col-md-3">
            <div class="panel panel-primary">
              <div class="panel-heading"><h4>Rating</h4></div>
              <ul class="list-group">
                <li class="list-group-item"><strong class="text-primary"><?php echo $rating['RatingAvg'] ?>/5</strong><?php echo " [".$rating['Votes']." votes]" ?></li>
                <li class="list-group-item">
                  <!-- Voting -->
                  <form action="vote.php" method="get" oninput="x.value=' ' + rng.value + ' '">
                    <div class="form-group text-center">
                      <output id="x" for="rng"> 3 </output> <span class="glyphicon glyphicon-thumbs-up"></span> <br>
                      <input type="range" id="rng" name="points" min="1" max="5" step="1">
                      <!-- The value of the hiddem input field is the ImageID -->
                      <input type="hidden" name="id" value=<?php echo $id ?>>
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Vote!</button>

                    </div>
                  </form>
                </li>
              </ul>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading"><h4>Image Details</h4></div>

              <ul class="list-group">
                <li class="list-group-item"><strong>Taken By: </strong> 
                  <?php
                    echo $user['FirstName']." ".$user['LastName'];
                  ?>
                </li>
                <li class="list-group-item"><strong>Country: </strong> 
                  <?php echo $photo['CountryCodeISO'] ?>
                </li>
                <li class="list-group-item"><strong>City: </strong> 
                    <?php 
                    if(isset($location['LocationName'])){
                      echo $location['LocationName'];
                    }
                    else{
                      echo "No city found";
                    }
                     ?>
                </li>
                <li class="list-group-item"><strong>Latitude: </strong> 
                  <?php echo $photo['Latitude'] ?>
                </li>
                <li class="list-group-item"><strong>Longitude: </strong> 
                  <?php echo $photo['Longitude'] ?>
                </li>
              </ul>
            </div>
          </div>
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
 <?php $db = null; ?>
 </html>