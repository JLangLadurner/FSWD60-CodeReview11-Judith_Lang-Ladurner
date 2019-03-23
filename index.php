<?php
ob_start();//JULAN: kind of like: "Start remembering everything that would normally be outputted, but don't quite do anything with it yet" - 'saved to buffer'
session_start();

function sanitize ($a){
  $b = $_POST[$a];
  $b = trim($b);
  $b = strip_tags($b);
  $b = htmlspecialchars($b);
  return $b;
}
require_once 'actions/db_connect.php';

// if there is no session set - it will route back to register pager
if ( isset($_SESSION['user'])!="" ) {
 header("Location: register.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = sanitize('email');
 $pass = sanitize('pass');
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($connect, "SELECT user_id, usr_email, passw FROM Users WHERE usr_email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);//JULAN: run Query and 'translate'
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
  
  if( $count == 1 && $row['passw']==$password ) {
   $_SESSION['user'] = $row['user_id'];//JULAN: if user name input equals name in row userid ...then it redirects to home page - and log in was successful
   header("Location: home_usr.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }

}
$emailError = "";
$nameError="";
$passError="";
$email ="";
$pass ="";
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>

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
  

  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div class="login">

    <h1>Welcome to my Travelblog...</h1>
    
 
  <div class="container bslf">
    
 
  <!-- JULAN: PHP_SELF = var - that returns the current script being executed. Variable returns the name and path of the current file (from root folder) -> use this in the action field of the Form  -->
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"> 
  
    
            <h2 class="text-center">Sign In.</h2>
            <hr />
            
           <?php
              if ( isset($errMSG) ) {
            echo $errMSG; ?> 
              
               <?php
            }


            ?>
            <!--referres to  error message above-->
           
          
            
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
          
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15"/>
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <hr />
            <label class="checkbox-inline pull-left"><input type="checkbox"> Remember me</label>
            <!--<a href="register.php" class="pull-right">Register Here...</a>-->
            <button type="submit" name="btn-login" class="btn btn-primary pull-right">Sign In</button>
            <br><br>
            <div class="clearfix">
            <a href="register.php" class="pull-left">Register Here...</a> <!-- if user does not have an account yet - directs back to register form -->
             </div>
         
          
         <!--    <hr /> -->
            
   </form>
           
   </div>
   
   </div>  


</body>
</html>
<?php ob_end_flush(); ?>
