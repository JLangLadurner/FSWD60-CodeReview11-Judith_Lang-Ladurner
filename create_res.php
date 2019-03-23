<?php 
require 'actions/db_connect.php';
?>

<!-- <!DOCTYPE html> -->
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
   <title>Travelblog  |  Add Restaurants</title>

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
          <li><a href="home_admin.php">Home</a></li>
          <li><a href="create_con">add Concerts</a></li>
          <li class="active"><a href="create-res">add Restaurants</a></li>
          <li><a href="create_places">add Places</a></li>
          <li><a href="#"></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><a href="search_admin.php"><span class="glyphicon glyphicon-search"></span>Search</a></li>
          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
  </div>
  

<fieldset>
   <legend>Add Restaurants</legend>

   <form action="actions/a_create_res.php" method="post">
       <table cellspacing="1" cellpadding="1">

           <tr>
               <th>Restaurant Name</th>
               <td><input type="text" name="res_name" placeholder="Enter Name" /></td>
           </tr>     
           <tr>
               <th>Address</th>
               <td><input type="text" name="res_address" placeholder="address" /></td>
           </tr>
            
           <tr>
               <th>Zip_Code</th>
               <td><select class="custom-select" name="loc_id">
                <option selected>Choose Zip Code</option>

                <?php 
                $sql = "
                SELECT * FROM `locations`";

                $result = $connect->query($sql);
                if ($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    print("
                      <option value ='".$row["loc_id"]."'>".$row['loc_zip']." ".$row['loc_city']."</option>");
                  }
                }
                 ?>
               </select>
                 </td>
           </tr>
          <tr>
               <th>Phone number</th>
               <td><input type="text" name="res_phone" placeholder="please insert picture phone number" /></td>
           </tr>
           <tr>
               <th>Type</th>
               <td><select type="text" name="res_type" placeholder="Please choose" />
               <option selected>Choose...</option>
               <option value="chinese">Chinese</option>
               <option value="italian">Italian</option>
               <option value="austrian">Austrian</option>
               <option value="other">Other</option>
               
               </td>
           </tr>
           <tr>
               <th>Short Description</th>
               <td><input type="text" name="res_description" placeholder="please insert short description" /></td>
           </tr>
           <tr>
               <th>Web Address</th>
               <td><input type="text" name="res_web" placeholder="please insert web address" /></td>
           </tr>
           
           <tr>
               <th>Image</th>
               <td><input type="text" name="res_img" placeholder="please insert picture URL" /></td>
           </tr>
           
            <tr>
               <td><button class="btn btn-success move" type="submit">Insert Restaurant</button></td>
               <td><a href="home_admin.php"><button class="btn btn-info move" type="button">Back</button></a></td>
           </tr>
       </table>
   </form>

</fieldset>
</div>

</body>
</html>