<?php
include ('include.php');

$sql="CREATE TABLE admin(
  id int NOT NULL AUTO_INCREMENT,
  full_name varchar(100),
  username varchar(100),
  password varchar(255),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($link));
}

$conn -> close();
?>