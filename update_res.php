<?php 

ob_start();
session_start();
require_once 'actions/db_connect.php'; //db connection file - check all data entries!!!

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}



if($_GET['res_id']) {
   $res_id = $_GET['res_id'];

   $sql = "SELECT * FROM restaurant WHERE res_id = {$res_id}";
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();

   //$connect->close();

?>

 <!DOCTYPE html>
 <html>
 <head>
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
  <title>Update Entries</title>

</head>
   

   

 </head>
 <body>
  <div class="container">
  <div class="row gradient">
    <header>
      <div class="col-lg-1">
        <img id ="logo" src="img/fresh_logo_color.png">
      </div>
      <div class="col-lg-9 col-lg-offset-2 data" id="headingdata">
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
          <li><a href="create_concert"></a>add Concerts</li>
          <li><a href="create_restaurant"></a>add Restaurants</li>
          <li><a href="create_places"></a>add Places</li>
          <li><a href="#"></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><a href="search_admin.php"><span class="glyphicon glyphicon-search"></span>Search</a></li>
          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
    </div>

  
    


  <fieldset>
   <legend>Update Entries</legend>

   <form action="actions/a_update_res.php" method="post">
     <table  cellspacing="2" cellpadding="2">
       
       <tr>
         <th>Restaurant Name</th>
         <td><input type="text" name="res_name" placeholder="Restaurant Name" value="<?php echo $data['res_name'] ?>" /></td>
       </tr>
       <tr>
           <th>Address</th>
           <td><input type="text" name="res_address" placeholder="JJJJ-MM-DD" value="<?php echo $data['res_address'] ?>"/></td>
         </tr>
         <tr>
           <th>Phone</th>
           <td><input type="text" name="res_phone" value="<?php echo $data['res_phone'] ?>"/></td>
           </tr> 
         
         <tr>
         <th>Description</th>
           <td><input type="text" name="res_description" value="<?php echo $data['res_description'] ?>"/></td>
           </tr>

           <tr>
           <th>Web Address</th>
           <td><input type="text" name="res_web" value="<?php echo $data['res_web'] ?>"/></td>
           </tr>
           

          <tr>
               <th>Image</th>
               <td><input type="text" name="res_img" value="<?php echo $data['res_img'] ?>" /></td>
           </tr> 
         
      <tr>
       <input type="hidden" name="res_id" value="<?php echo $data['res_id']?>" />
       <td><button class="btn btn-success move" name="submit" type="submit">Save Changes</button></td>
       <td><a href="home_admin.php"><button class="btn btn-info move" type="button">Back</button></a></td>
      </tr>
      </table>
      </form>

      </fieldset>
        </div>



      </body>
      </html>
<?php 
}
?>