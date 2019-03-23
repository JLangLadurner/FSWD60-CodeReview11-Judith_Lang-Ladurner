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





// session id must match user_id!!
$res=mysqli_query($connect, "SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
if ($userRow["admin"] == 'yes') {
// if a user is marked as an admin he will be redirected to home-admin page
  header("Location: home_admin.php ");
  exit;
  
}
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
   <!-- main container start -->
  <div class="container bg-grey main">
  <div class="row header">
    <header>
      <div class="col-lg-2">
        <img id ="logo" src="img/fresh_logo_color.png">
      </div>
      <div class="col-lg-8 col-lg-offset-2 data" id="headingdata">
        <h1>Welcome to my Travelblog</h1>
      </div>
    </header>
    <!-- slider start -->

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img id = "slides" src="img/Opera.jpg" alt="First slide">
          <!-- Static Header -->
          <div class="header-text hidden-xs">
          </div><!-- /header-text -->
        </div>
        <div class="item">
          <img id = "slides" src="img/Belvedere.jpg" alt="Second slide">
        </div>
        <div class="item">
          <img id = "slides" src="img/viennaNight.jpg" alt="Third slide">
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div><!-- /carousel -->
    </div>
  </div>
  <!-- nav bar start -->
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
          <li><a href="home_usr.php">Home</a></li>
          <li class="active"><a href="restaurant.php">Restaurants</a></li>
          <li><a href="events.php">Events</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><a href="search.php"><span class="glyphicon glyphicon-search"></span>Search</a></li>
          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
  </div>
  
	
     <div class="row">
       <h5>Where you find food....</h5>
     </div>
      <!-- INNER JOIN with the foreign keys-->
      
    <div>   
    <div class="headline">
     <h5>Restaurants</h5> 
  </div>

    <?php
   $sql3 = "SELECT * FROM restaurant
      INNER JOIN `locations` ON restaurant.fk_loc_id = locations.loc_id
      ";

      $result = $connect->query($sql3);

      
      if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {

        echo "<div  class='col-md-4'>
        <div class='thumbnail text-center'style='width: 26rem'>
        <img id='img' class='card-img-top' src = ".$row['res_img']."  alt='Card image cap'>
        <h5>".$row['res_name']."</h5>
        <p>".$row['res_description']." </p>
        <p>Location:".$row['res_address']." </p>
        <p>Where: ".$row['loc_zip']." ".$row['loc_city']." </p>
        <p><i id='phone' class='glyphicon glyphicon-phone'>  ".$row['res_phone']."</i></p>
        <a href=".$row['res_web']."><span class='glyphicon glyphicon-globe'></span></a>
        <hr>
        <small class=text-muted>type: ".$row['res_type']."</small></div></div>
        ";

      }
    } else {
     echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
   }
   ?>
   </div>

<hr>
</div>
<div class="row">
<footer id="myfoot" class="container text-center">
  <img src="img/codefactory-vienna-logo.png" width="150px" height="50px" alt="codefactory">
  <p>CodeReview 11 </p>
  <p>&copy; Judith Lang-Ladurner  </p>
</footer>
   </div>         
          
  
        
 
</body>
</html>
<?php ob_end_flush(); ?><!--JULAN: ob_flush() empties the buffer but keeps buffer itself to be re-used (filled) when needed. ob_end_flush() empties the buffer and destroys the buffer itself - so memory is freed for other use-->