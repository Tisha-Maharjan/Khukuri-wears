<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">

    <?php
      
      //check whether the3 id is set or not
      if(isset($_GET['id'])){

        // echo "Getting the data";
        $id=$_GET['id'];

        $sql="SELECT * FROM category WHERE id=$id";

        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);

        if($count==1){
          //get data
          $row=mysqli_fetch_assoc($res);
          $title=$row['title'];
          $current_image=$row['image_name'];
          $featured=$row['featured'];
          $active=$row['active'];

        }else{
          //redirect to manage category
          $_SESSION['no-category-found']="<div class='error'>Category Not Found</div>";
          header("location:".$home.'admin/manage-category.php');
        }


      }else{
        header("location:".$home.'admin/manage-category.php');
      }
    
    ?>

    <form action="" class="add-form" method="POST" enctype="multipart/form-data">
      <h2 class="add-category heading-secondary center-text">Update Category</h2>
      <div class="center-container">
        <div class="update-category-form">

          <div class="title">
            <label class="add-category-label" for="title">Category Title</label><input class="add-box" name="title"
              value="<?php echo $title; ?>" id="title" type="text" placeholder="" required />
          </div>

          <div class="image">
            <label class="add-category-label" for="image">Current Image</label><?php
              if($current_image!=""){
                //display image
                ?>
            <img src="<?php echo $home;?>img/category/<?php echo $current_image;?>" width="100px">


            <?php

              }else{
                //error message
                echo "<div class='error'>Image Not Added</div>";

              }
            ?>
          </div>


          <div class="image">
            <label class="add-category-label" for="image">New Image</label><input class="add-box" name="image"
              id="image" type="file" placeholder="" required />
          </div>


          <div class="featured">
            <label class="add-category-label" for="featured">Featured</label>
            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes

            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
          </div>


          <div class="active">
            <label class="add-category-label" for="active">Active</label>
            <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes

            <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
          </div>




          <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <input type="submit" name="submit" class="update-category-btn" value="Update Category" />
        </div>
      </div>
    </form>

    <?php

      if(isset($_POST['submit'])){
        // echo "clicked";
        //get value from form
        $id=$_POST['id'];
        $title=$_POST['title'];
        $current_image=$_POST['current_image'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];


        //update new image if selected
        if(isset($_FILES['image']['name'])){
          //get image detail
          $image_name=$_FILES['image']['name'];

          if($image_name!=""){
            //img available
            //1.upload the new image
            //Auto rename our image
            //get the extension of our image(jpg,png,gif,etc) 
            $ext=end(explode('.',$image_name));
            //rename image
            $image_name="Category_".rand(000,999).'.'.$ext;



            $source_path=$_FILES['image']['tmp_name'];

            $destination_path="../img/category/".$image_name;

            //upload the image
            $upload=move_uploaded_file($source_path,$destination_path);

            //check whether the image is uploaded or not
            //and if image is not uploaded then we will stop the process and redirect with error message
            if($upload==false){
              $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
              header("location:".$home.'admin/manage-category.php');
              die();//stop the process
            }
            
            //2.remove current image if available
            if($current_image!=""){
              $remove_path="../img/category/".$current_image;
              $remove=unlink($remove_path);

              //check if the image is removed or not 
              //if failed to remove dispaly message and stop process
              if($remove==FALSE){
                //failed to remove image
                $_SESSION['failed-remove']="<div class='error'>Failed to remove image.</div>";
                header("location:".$home.'admin/manage-category.php');
                die();//stop process
              }
            }

            
          }else{
            $image_name=$current_image;            
          }

        }else{
          $image_name=$current_image;
        }


        //update database
        $sql2="UPDATE category SET 
          title='$title',
          image_name='$image_name',
          featured='$featured',
          active='$active'
          WHERE id=$id
        ";
        
        //ececute query
        $res2=mysqli_query($conn,$sql2);

        //redirect to manage category with message
        if($res2==TRUE){
          //category updated
          $_SESSION['update']="<div class='success'>Category Updated Successfully</div>";
          // header("location:".$home.'admin/manage-category.php');
          ?>
    <script type="text/javascript">
    window.location = 'manage-category.php';
    </script>
    <?php

        }else{
          //failed to update category
          $_SESSION['update']="<div class='error'>Failed To Update Category</div>";
          // header("location:".$home.'admin/manage-category.php');
          ?>
    <script type="text/javascript">
    window.location = 'manage-category.php';
    </script>
    <?php
        }


      }

    ?>

  </div>
</div>

<?php
  //include('partials/footer.php')
?>