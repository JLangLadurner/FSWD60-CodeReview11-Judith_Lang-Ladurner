<?php 

require_once 'actions/db_connect.php';

if($_GET['res_id']) {
$res_id = $_GET['res_id'];

 $sql = "SELECT * FROM restaurant WHERE res_id = {$res_id}";
 $result = $connect->query($sql);
 $data = $result->fetch_assoc();

 $connect->close();
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
  <title>Delete Restaurants</title>

</head>
<body>
	<div class="container ">
		

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

    <h3>Do you really want to delete this restaurant?</h3>
    <form action="actions/a_delete_res.php" method="post">

     <input type="hidden" name="res_id" value="<?php echo $data['res_id']?>" />
     <button class="btn btn-danger text-center"type="submit">Yes, delete it!</button>
     <a href="home_admin.php"><button class="btn btn-info text-center" type="button">No, go back!</button></a>
   </form>

</div>
</body>

</html>

<?php
}
?>