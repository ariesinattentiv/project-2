<?php
session_start();
require_once("dbconnections.php");
require_once("random.php");

// include_once will continue execution even if it cant find the file
// require_once will stop execution if it can't find file
// ^ copies all code in the given file into the file it's being called in

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
     <div class="col-md-12">  <!-- start main content column -->
      <div class="panel panel-danger spaceabove">           
       <div class="panel-heading"><h3>Welcome User Name</h3></div>
       <div class="panel-body">
        <div class="row">
          <div class=col-md-12>
            <div class="alert alert-info">
              <h4>Assignment #4: Database Driven Website</h4>
              <p>This is the <strong>User Name's</strong> last assignment for CS3500</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 text-center">
            <h4><span class="glyphicon glyphicon-th-list"></span> Post List</h4>
            <p>Display a list of all the posts in this site order by posting date</p>
            <a href="post_list.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-th-list"></span> Post List</a>
          </div>
          <div class="col-md-3 text-center">
            <h4><span class="glyphicon glyphicon-file"></span> Single Post</h4>
            <p>Display information for a single random post</p>
            <!-- Substitute post_single.php?id=1 for a random PostID from the database -->
            <a href=<?php echo "post_single.php?id=".$random_post[0] ?> class="btn btn-default" role="button"><span class="glyphicon glyphicon-file"></span> Random Post</a>
          </div>
          <div class="col-md-3 text-center">
            <h4><span class="glyphicon glyphicon-picture"></span> Single Image</h4>
            <p>Display information for a single random image</p>
            <!-- Substitute image.php?id=1 for a random ImageID from the database -->
            <a href=<?php echo "image.php?id=".$random_img[0] ?> class="btn btn-default" role="button"><span class="glyphicon glyphicon-picture"></span> Random Image</a>
          </div>
          <div class="col-md-3 text-center">
            <h4><span class="glyphicon glyphicon-search"></span> Search</h4>
            <p>Perform a search on post titles or post contents</p>
            <a href="search.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-search"></span> Search</a>
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
 </html>