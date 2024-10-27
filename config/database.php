<?php
$hostname="localhost";
$username="root";
$password="";

$conn=mysqli_connect($hostname,$username,$password);
if(!$conn){
  die ("Error: could not connect".mysqli_connect_error())."<br>";
}else{
  echo "connection successfull"."<br>";
}

$sql="Create DATABASE khukuriwears";
if(mysqli_query($conn,$sql)){
  echo "Database created successfully"."<br>";
}else{
  echo "Error creating databse".mysqli_error($conn);
}
$conn -> close();
?>