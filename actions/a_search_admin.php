<?php 
// You can access the values posted by jQuery.ajax

require_once 'db_connect.php';

// through the global variable $_POST, like this:
$bar = isset($_POST['search']) ? $_POST['search'] : null;//JULAN - references to the 'Name' in the form field and puts it in a var




if(strlen($bar)>0){
$query = "SELECT * FROM restaurant 
      INNER JOIN `locations` ON restaurant.fk_loc_id = locations.loc_id
      WHERE res_name like '".$bar."%';";

$result = mysqli_query($connect,$query);
if($result->num_rows >0){
  while($row = $result->fetch_assoc()){
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
                  </table>
        ";
  }
}else {
  echo "no Entry"; 
 }
}

 $connect->close();

?>