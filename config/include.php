<?php
  session_start();

  $home="http://localhost/Khukuri-wears/";
  $hostname="localhost";
  $username="root";
  $password="";
  $db="khukuriwears";

  $conn=mysqli_connect($hostname,$username,$password,$db);
  if(!$conn){
    die ("Error: could not connect".mysqli_connect_error())."<br>";
  }
?>