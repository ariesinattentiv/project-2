<?php
require_once("dbconnections.php");
require_once("random.php")


?>
<div class="rail">

   <div class="alert alert-danger">
   
   <strong><span class="glyphicon glyphicon-user"></span> User Name </strong><br/>
   CS3500 Student<br/>
   <span class="member-box-links"><a href="profile.php">Profile</a> | <a href="login.php?logout=1">Logout</a></span>
  <hr>
   <ul class="nav nav-stacked">
   <li class="nav-header"> <strong><span class="glyphicon glyphicon-globe"></span>  My Travels</strong></li> 
     <li><a href="post_list.php"><span class="glyphicon glyphicon-th-list"></span> Post List</a></li>
     <!-- Substitute post_single.php?id=1 for a random PostID from the database -->
     <li><a href="<?php echo "post_single.php?id=".$random_post[0] ?>"><span class="glyphicon glyphicon-file"></span> Single Post</a></li>
     <!-- Substitute image.php?id=1 for a random ImageID from the database -->
     <li><a href="<?php echo "image.php?id=".$random_img[0] ?>"><span class="glyphicon glyphicon-picture"></span> Single Image</a></li>
     <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search</a></li> 
   </ul>
 </div>
</div>
