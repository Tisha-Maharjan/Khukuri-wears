<?php
include ('include.php');

$sql="CREATE TABLE cart(
  id int NOT NULL AUTO_INCREMENT,
  user_id int(100),
  pid int(100),
  title varchar(150),
  size varchar(10),
  price decimal(10,2),
  quantity int(100),
  image_name varchar(255),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($link));
}

$conn -> close();
?>