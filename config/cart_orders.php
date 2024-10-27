<?php
include ('include.php');

$sql1="CREATE TABLE cart_orders(
  id int NOT NULL AUTO_INCREMENT,
  user_id int(100),
  name varchar(100),
  phone varchar(12),
  email varchar(255),
  address varchar(255),
  city varchar(255(,
  total_products varchar(1000),
  total_price decimal(10,2), 
  order_date datetime,
  status varchar(50),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql1)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($link));
}

$conn -> close();
?>