<?php
ob_start();//JULAN: kind of like: "Start remembering everything that would normally be outputted, but don't quite do anything with it yet" - 'saved to buffer'
session_start();

//function to make 'sanitize' quicker!
function sanitize ($a){
  $b = $_POST[$a];
  $b = trim($b);
  $b = strip_tags($b);
  $b = htmlspecialchars($b);
  return $b;
}

 // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home_usr.php"); // redirects to home.php 
}
include_once 'actions/db_connect.php'; //JULAN:adds database connection - check if the right db is connected


$error = false; //if there is no session = id in header then do the following


if ( isset($_POST['btn-signup']) ) {//JULAN:references to name of sign up button

  //here is the sanitize function in use - just shorter to use it
 
$firstname = sanitize('firstname');
$lastname = sanitize('lastname');
$email = sanitize('email');
$pass = sanitize('pass');



 // basic name validation - adjust to sign up form used!!!
 if (empty($firstname)) {

  $error = true; //if there is not session in use - so ther error is true...

  $nameError = "Please enter your first name.";
 } else if (strlen($firstname) < 3) {//JULAN: strlen() - returns the length of a string
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {//JULAN: preg_match() - performs a pattern match on a string
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }
 if (empty($lastname)) {
  $error = true;
  $nameError = "Please enter your last name.";
 } else if (strlen($lastname) < 3) {//JULAN: strlen() - returns the length of a string
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {//JULAN: preg_match() - performs a pattern match on a string
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {//JULAN: filter_var() filters a variable with a specified filter
  $error = true;
  $emailError = "Please enter valid email address.";
 } else{
  // checks whether the email exists or not-- adjust to table names in db used
  $query = "SELECT usr_email FROM Users WHERE usr_email='$email'";
  $result = mysqli_query($connect, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){//JULAN: different way to write it is with '>' but != is faster! - meaning: count not equal to 0
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters.";
 }

 // password hashing for security 
$password = hash('sha256', $pass);
//JULAN: this function takes up to 3 parameters/PHP has a total of 46 registered hashing algorithms among which 'sha1', 'sha256', 'mmd5', haval160,4' are the most popular ones;


 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO users(usr_first_name,usr_last_name,usr_email,passw) VALUES('$firstname','$lastname','$email','$password')";// use password variable to return 'hashed' password!!

  $res = mysqli_query($connect, $query); //JULAN: check connection and run query
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($firstname);//JULAN: removes it from the current scope and destroys it's associated data; 
   unset($lastname);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}

// shows empty fields in form, when no button is pressed - on page reload
$emailError = "";
$nameError="";
$passError="";
$email ="";
$firstname="";
$lastname="";
$pass ="";
?>



<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class= "container">
    
  
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
      
            <h2>Sign Up.</h2>
            <hr />
          
           <?php
   if ( isset($errMSG) ) {
  
   ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?>
          
      
          <!--JULAN: has all registration fields except user id because it is auto incremented-->

            <input type="text" name="firstname" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $firstname ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>

            <input type="text" name="lastname" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $lastname ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
          
    

            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
        
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
      
            <hr />

          
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
          
            <a href="index.php">Sign in Here...</a> <!--JULAN: directs to index and the form to fill in your newly created user credentials-->
    
  
   </form>
   </div>
</body>
</html>
<?php ob_end_flush(); ?>