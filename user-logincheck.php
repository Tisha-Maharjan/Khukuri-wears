<?php
  //Authorization access control
  //check whether the user is logged in or not
  if(!isset($_SESSION['fullname'])){ //if user session is not set
    //user is not logged in
    //redirect to login page 
    $_SESSION['no-login-message']="<div class='error text-center'>Please login to access User Panel.</div>";

    //redirect to login page
    header('location:'.$home.'user-login.php'); 

  }
  

?>