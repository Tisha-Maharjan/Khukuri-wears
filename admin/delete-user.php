<?php
  
  include('../config/include.php');
  $id=$_GET['id'];

  //for delete admin
  $sql="Delete FROM user WHERE id=$id";

  //execute query
  $res=mysqli_query($conn,$sql);

  if($res==TRUE){
    //Query executed successfully and Admin Deleted
    // echo "admin Deleted";
    $_SESSION['delete']="<div class='success'>User Deleted Successfully.</div>";

    header('location:'.$home.'admin/manage-user.php');
  }
  else{
    //Failes to Delete Admin
    // echo "Failed to delete admin";

    $_SESSION['delete']="<div class='error'>Failed to Delete User. Try Again Later.</div>";
    header('location:'.$home.'admin/manage-user.php');

  }

?>