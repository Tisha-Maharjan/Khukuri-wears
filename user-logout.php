<?php
  include ('config/include.php');
  //Destroy the session
  session_destroy();//unset $_session['user']
  
  //redirect to login page
  header('location:'.$home.'user-login.php');
?>