<?php
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: index.php");//JULAN: check if there is a session from a user
} else if(isset($_SESSION['user'])!="") { //JULAN: if not: go back to log in!!
 header("Location: home.php");
}

if (isset($_GET['logout'])) {//JULAN: homepage - logout was clicked and header shows logout then-->
 unset($_SESSION['user']);//JULAN: deletes the variable of the session of the user;
 session_unset();//JULAN: deletes the variable from the session - session still exists - only data is cleared 
 session_destroy();// JULAN: destroys the session data that is stored in the session storage (file in the file sysstem) 
 header("Location: index.php"); //JULAN goes back to index page- where you can sign in again at any thime
 exit;
}
?>