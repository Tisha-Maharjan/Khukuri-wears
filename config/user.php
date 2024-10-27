<?php
include ('include.php');

$sql="CREATE TABLE user(
  id int NOT NULL AUTO_INCREMENT,
  fullname varchar(255),
  username varchar(100),
  password varchar(255),
  phone varchar(255),
  email varchar(150),
  address varchar(100),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($link));
}

$conn -> close();
?>