<?php
include ('include.php');

$sql="CREATE TABLE cart_before(
    id int(11),
    rand_id int(200),
    pid int(100),
    title varchar(150),
    size varchar(10),
    price decimal(10,2),
    quantity int(100),
    image_name varchar(255)
  )";
  
  if(mysqli_query($conn,$sql)){
    echo "Table created"."<br>";
  }else{
    die ("Error creating table".mysqli_error($link));
  }
  
  $conn -> close();
  ?>
