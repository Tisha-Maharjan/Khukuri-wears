<?php
include ('include.php');

$sql="CREATE TABLE orders(
  id int NOT NULL AUTO_INCREMENT,
  product varchar(150),
  price decimal(10,2),
  qty int, 
  total decimal(10,2),
  order_date datetime,
  status varchar(50),
  customer_name varchar(150),
  customer_contact varchar(20),
  customer_email varchar(150),
  customer_address varchar(255),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($conn));
}

$conn -> close();
?>