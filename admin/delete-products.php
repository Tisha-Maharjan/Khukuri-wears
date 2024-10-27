<?php 
  // echo "delete";

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
      $path="../img/products/".$image_name;
      //remove the image
      $remove=unlink($path);

      if($remove==FALSE){
        $_SESSION['upload']="<div class='error'>Failed To Remove Image</div>";
        header("location:".$home.'admin/manage-products.php');
        // stop the process
        die();
      }

      //delete data from databse
      //query to delete data form databse
      $sql="DELETE FROM products WHERE id=$id";

      $res=mysqli_query($conn,$sql);
      
      if($res==TRUE){
        //seccess
        $_SESSION['delete']="<div class='success'>Product Deleted Successfully</div>";
        header("location:".$home.'admin/manage-products.php');
      }
      else{
        //failed
        $_SESSION['upload']="<div class='error'>Failed To Delete Category</div>";
        header("location:".$home.'admin/manage-products.php');
      }

    }   

  }else{
    //redirect to manage category page
    $_SESSION['unauthorize']="<div class='error'>Unauthorized Access</div>";
    header("location:".$home.'admin/manage-products.php');
  
  }

?>