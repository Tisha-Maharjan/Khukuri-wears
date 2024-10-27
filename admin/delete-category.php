<?php
include('../config/include.php');

  // echo "Delete Page";
  // check if image name and id is set or not
  if(isset($_GET['id']) AND isset($_GET['image_name'])){
    // echo "get value and delete";

    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    // delete physical image from category
    if($image_name!=""){
      //image is available so remove it
      $path="../img/category/".$image_name;
      //remove the image
      $remove=unlink($path);

      if($remove==FALSE){
        $_SESSION['remove']="<div class='error'>Failed To Remove Category Image</div>";
        header("location:".$home.'admin/manage-category.php');
        // stop the process
        die();
      }

      //delete data from databse
      //query to delete data form databse
      $sql="DELETE FROM category WHERE id=$id";

      $res=mysqli_query($conn,$sql);
      
      if($res==TRUE){
        //seccess
        $_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
        header("location:".$home.'admin/manage-category.php');
      }
      else{
        //failed
        $_SESSION['remove']="<div class='error'>Failed To Delete Category</div>";
        header("location:".$home.'admin/manage-category.php');
      }

    }   

  }else{
    //redirect to manage category page
    header("location:".$home.'admin/manage-category.php');
  
  }


?>