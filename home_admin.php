<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}

// if a user is marked as an admin he will be redirected to home-admin page

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Karla" rel="stylesheet">
  

  <link rel="stylesheet" type="text/css" href="css/style01.css">
  <title>Welcome To My Travelblog</title>

</head>
<body>   
<div class="container">
  <div class="row">
    <header>
      <div class="col-lg-2">
        <img id ="logo" src="img/fresh_logo_color.png">
      </div>
      <div class="col-lg-8 col-lg-offset-2 data" id="headingdata">
        <h1>Welcome to my Travelblog</h1>
      </div>
    </header>
    </div>
    <div class="row">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.html"><img src="img/fresh_logo_color.png" width="70px" height="30px" alt="logo"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home_admin.php">Home</a></li>
          <li><a href="create_con.php">add Concerts</a></li>
          <li><a href="create_res.php">add Restaurants</a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><a href="search_admin.php"><span class="glyphicon glyphicon-search"></span>Search</a></li>
          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
  </div>
    

  <div class="row">
  <!-- <div class="col-sm-1 col-sm-offset_11">  
   <a href="create_concerts.php"><button class="btn btn-success" type="button">Add concerts</button></a>  
  <a href="search_admin.php"><button class="btn btn-info" type="button">Search Books</button></a>
    
    </div> -->
      </div>
      <div class="row">
        <div class="col-lg-11 col-lg-offset-1">
         <!-- <table class="table-bordered" > 
             <thead>
                 <tr>
                     
                     <th>ISBN Code</th>
                     <th>Title</th>
                     <th>Publication year</th>
                     <th>Publisher</th>
                     <th>Author</th>
                     <th>Book Language</th>
                     <th>Image</th>
                     <th>Genre</th>
                     <th>Available</th>
                     <th>Action</th>
           </tr>
         </thead>
         <tbody> -->
         	<h1> Hi Admin</h1>
          <!-- INNER JOIN with the foreign keys-->
           <?php
           $sql = "SELECT * FROM restaurant 
            INNER JOIN `locations` ON restaurant.fk_loc_id = locations.loc_id
           ";

           $result = $connect->query($sql);

        
           if($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
               		
                
                   echo "<table class='table-bordered' > 
                   <thead>
                       <tr>
                     <th>Restaurant Name</th>
                     <th>Address</th>
                     <th>Phone</th>
                     <th>Type</th>
                     <th>Zip_Code</th>
                     <th>City</th>
                     <th>Description</th>
                     <th>Web</th>
                     <th>Image</th>
                     <th>Action</th>
                       </tr>
                 </thead>
                 <tbody><tr>
                        <td>".$row['res_name']."</td>
                        <td>".$row['res_address']."</td>
                        <td>".$row['res_phone']."</td>
                        <td>".$row['res_type']."</td>
                        <td>".$row['loc_zip']."</td>
                        <td>".$row['loc_city']."</td>
                        <td>".$row['res_description']."</td>
                        <td>".$row['res_web']."</td>
                        <td><img id='img' class='card-img-top' src = ".$row['res_img']." width=100px height=100px alt='Card image cap'></td>

                       <td>
                           <a href='update_res.php?res_id=".$row['res_id']."'><button type='button'>Edit</button></a>
                           <a href='delete_res.php?res_id=".$row['res_id']."'><button type='button'>Delete</button></a>
                       </td>
                   </tr>
                   </tbody>
                  </table>";
               }
           } else {
               echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
           ?>

            
       
</div>
 </div> 
</div>



</body>
</html>