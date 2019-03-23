<?php 
// You can access the values posted by jQuery.ajax

require_once 'db_connect.php';

// through the global variable $_POST, like this:
$bar = isset($_POST['search']) ? $_POST['search'] : null;//JULAN - references to the 'Name' in the form field and puts it in a var



if(strlen($bar)>0){
$query1 = "SELECT * FROM concert 
      INNER JOIN `locations` ON concert.fk_loc_id = locations.loc_id
      WHERE con_name like '".$bar."%';";
      


$result = mysqli_query($connect,$query1);
if($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		echo "<div  class='col-md-4'>
        <div class='thumbnail text-center'style='width: 23rem'>
        <img id='img' class='card-img-top' src = ".$row['con_img']." alt='Card image cap'>
        <h5>".$row['con_name']."</h5>
        <p><strong>Date: ".$row['con_date']."</strong></p>
        <p>Start: ".$row['con_start']." </p>
        <p>Price: €".$row['con_price']." </p>
        <p>Location: ".$row['con_address']." </p>
        <p>Where:".$row['loc_zip']." ".$row['loc_city']." </p>
        <a href=".$row['con_web']."><span class='glyphicon glyphicon-globe'></span></a>
        <hr>
        <small class=text-muted>genre: ".$row['con_type']."</small></div></div>
        ";
	}
}/*else {
	echo "no Entry";
}*/

}

if(strlen($bar)>0){
$query2 = "SELECT * FROM restaurant 
      INNER JOIN `locations` ON restaurant.fk_loc_id = locations.loc_id
      WHERE res_name like '".$bar."%';";

$result = mysqli_query($connect,$query2);
if($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    echo "<div  class='col-md-4'>
        <div class='thumbnail text-center'style='width: 23rem'>
        <img id='img' class='card-img-top' src = ".$row['res_img']."  alt='Card image cap'>
        <h5>".$row['res_name']."</h5>
        <p>".$row['res_description']." </p>
        <p>Location:".$row['res_address']." </p>
        <p>Where: ".$row['loc_zip']." ".$row['loc_city']." </p>
        <a href=".$row['res_web']."><span class='glyphicon glyphicon-globe'></span></a>
        <a href=".$row['res_phone']."><span class='glyphicon glyphicon-phone'></span></a>
        <hr>
        <small class=text-muted>type: ".$row['res_type']."</small></div></div>
        ";
  }
}/*else {
  echo "no Entry"; JULAN: brings up not entry if letter is not found in this query
}*/
 }
 if(strlen($bar)>0){
$query3 = "SELECT * FROM place 
      INNER JOIN `locations` ON place.fk_loc_id = locations.loc_id
      WHERE place_name like '".$bar."%';";

$result = mysqli_query($connect,$query3);
if($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    echo "<div  class='col-md-4'>
        <div class='thumbnail text-center'style='width: 23rem'>
        <img id='img' class='card-img-top' src = ".$row['place_img']." alt='Card image cap'>
        <h5>".$row['place_name']."</h5>
        <p>".$row['p_description']." </p>
        <p>Location:".$row['place_address']." </p>
        <p>Where: ".$row['loc_zip']." ".$row['loc_city']." </p>
        <a href=".$row['place_web']."><span class='glyphicon glyphicon-globe'></span></a>
        <hr>
        <small class=text-muted>type: ".$row['place_type']."</small></div></div>
        ";
  }
}/*else {
  echo "no Entry"; JULAN: brings up not entry if letter is not found in this query
}*/
 }
 $connect->close();

?>