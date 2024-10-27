<?php
// include('partials/admin-header.php');
include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">
    <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
    ?>

    <!-- add category form begins -->
    <form action="" method="POST" enctype="multipart/form-data" class="add-form">
      <h2 class="add-category heading-secondary center-text">Add Category</h2>
      <div class="center-container">
        <div class="add-category-form">

          <div class="title">
            <label class="add-category-label" for="title">Category Title</label><input class="add-box" name="title"
              id="title" type="text" placeholder="" required />
          </div>


          <div class="image">
            <label class="add-category-label" for="image">Select Image</label><input class="add-box" name="image"
              id="image" type="file" placeholder="" required />
          </div>

          <div class="featured">
            <label class="add-category-label" for="featured">Featured</label>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="No">No
          </div>

          <div class="active">
            <label class="add-category-label" for="active">Active</label>
            <input type="radio" name="active" value="Yes">Yes
            <input type="radio" name="active" value="No">No
          </div>

          <input type="submit" name="submit" class="add-category-btn" value="Add Category" />
        </div>
      </div>

    </form>
    <!-- add category form ends -->

    <?php

    if(isset($_POST['submit'])){
      // echo"clicked";
      $title=$_POST['title'];

      if(isset($_POST['featured'])){

        $featured=$_POST['featured'];
      }else{
        //set default value
        $featured = "No";
      }

      if(isset($_POST['active'])){

        $active=$_POST['active'];
      }else{
        //set default value
        $active="No";
      }

      //check whether image is selected or not and set the value for image name accordingly
      //print_r($_FILES['image']);

      //die();//break the code here

      if(isset($_FILES['image']['name'])){
        //upload the image
        //to upload image we need image name and source path and destinatuon path
        $image_name=$_FILES['image']['name'];

        //Auto rename our image
        //get the extension of our image(jpg,png,gif,etc) 
        $ext=end(explode('.',$image_name));
        //rename image
        $image_name="Category".rand(000,999).'.'.$ext;


        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="../img/category/".$image_name;

        //upload the image
        $upload=move_uploaded_file($source_path,$destination_path);

        //check whether the image is uploaded or not
        //and if image is not uploaded then we will stop the process and redirect with error message
        if($upload==false){
          $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
          header("location:".$home.'admin/add-category.php');
          //stop the process
          die();
        }

      }else{
        //dont upload imagea and set the image name value as blank
        $image_name="";
      }


      //insert into databse
      $sql="Insert INTO category(title,image_name,featured,active)
        VALUES('$title','$image_name','$featured','$active')
      ";

      $res=mysqli_query($conn,$sql);

      if($res==TRUE){
        //category added
        $_SESSION['add']="<div class='success'>Category Added Successfully</div>";
        // header("location:".$home.'admin/manage-category.php');
        ?>
    <script type="text/javascript">
    window.location = 'manage-category.php';
    </script>
    <?php
      }
      else{
        //failed to add category
        $_SESSION['add']="<div class='error'>Failed to Add Category</div>";
        // header("location:".$home.'admin/add-category.php');
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
// include('partials/footer.php');
?>