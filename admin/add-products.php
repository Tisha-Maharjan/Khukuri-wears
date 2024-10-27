<?php
// include('partials/admin-header.php');
include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">

    <?php

      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
    ?>

    <form action="" method="POST" enctype="multipart/form-data" class="add-form">
      <h2 class="add-product heading-secondary center-text">Add Product</h2>
      <div class="center-container">
        <div class="add-product-form">

          <div class="title">
            <label class="add-product-label" for="title">Product Title</label><input class="add-box" name="title"
              id="title" type="text" placeholder="" required />
          </div>

          <!-- <div class="description">
            <label class="add-product-label" for="description">Description</label><textarea name="description" cols="30"
              rows="5" placeholder="Description of the product" class="add-box"></textarea>
          </div> -->

          <!-- <div class="size">
            <label class="add-product-label" for="size">Size</label>

            <input class="add-box" name="size" id="size" type="text" placeholder="" required />
          </div> -->

          <div class="price">
            <label class="add-product-label" for="price">Price</label><input class="add-box" name="price" id="price"
              type="text" placeholder="" required />
          </div>

          <div class="image">
            <label class="add-product-label" for="image">Select Image</label><input class="add-box" name="image"
              id="image" type="file" placeholder="" required />
          </div>

          <div class="stock">
            <label class="add-product-label" for="image">Number of Stock</label><input class="add-box" name="stock"
              id="stock" type="number" placeholder="" required />
          </div>

          <!-- <div class="status">
            <label class="add-product-label" for="image">Status</label>
            <select name="status" id="status">
              <option value="Available">Available</option>
              <option value="Unavailable">Unavailable</option>
            </select>
          </div> -->

          <div class="category">
            <label class="add-product-label" for="category">Category</label>
            <select name="category" class="box">

              <?php 
    //create php code to display categories from database
    //1. sql to get all active categories form database

    $sql="SELECT * FROM category WHERE active='Yes'";


    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count>0){

      while($row=mysqli_fetch_assoc($res)){
        //get the details of categories
        $id=$row['id'];
        $category_title=$row['title'];
        ?>

              <option value="<?php echo $category_title;?>"><?php echo $category_title; ?></option>

              <?php
      }

    }else{
      ?>
              <option value="0">No Categories Found</option>

              <?php
    }


    //2.display drop down

  ?>
            </select>
          </div>

          <div class="featured">
            <label class="add-product-label" for="featured">Featured</label>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="No">No
          </div>

          <div class="active">
            <label class="add-product-label" for="active">Active</label>
            <input type="radio" name="active" value="Yes">Yes
            <input type="radio" name="active" value="No">No
          </div>

          <input type="submit" name="submit" class="add-product-btn" value="Add Product" />
        </div>
      </div>

    </form>

    <?php

        if(isset($_POST['submit'])){

          // echo "clicked";

          //get data from form
          $title=$_POST['title'];
          // $description=$_POST['description'];
          // $size=$_POST['size'];
          $price=$_POST['price'];
          $stock=$_POST['stock'];
          // $category=$_POST['category'];
          $category_title=$_POST['category'];

          // if(isset($_POST['status'])){
          //   $status=$_POST['status'];
          // }
          // else{
          //   $status="unavailable"; //setting default value
          // }

          //check radio button
          if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
          }
          else{
            $featured="No"; //setting default value
          }

          if(isset($_POST['active'])){
            $active=$_POST['active'];
          }
          else{
            $active="No"; //setting default value
          }


          //upload the image if selected
          //chechk whether the select image is clicked or not and upload the  image only if the image is selected
          if(isset($_FILES['image']['name'])){
            //get details of selcted image
            $image_name=$_FILES['image']['name'];

            //check if imaghe is selected and upload if image is selected
            if($image_name!=""){
              // image is selected
              //rename the image
              $ext=end(explode('.',$image_name));

               //upload the image
               $image_name="Product_Name_".rand(0000,9999).'.'.$ext;



               $src=$_FILES['image']['tmp_name'];
     
               $dst="../img/products/".$image_name;
     
               //upload the image
               $upload=move_uploaded_file($src,$dst);
     
               //check whether the image is uploaded or not
               //and if image is not uploaded then we will stop the process and redirect with error message
               if($upload==false){
                 $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                 header("location:".$home.'admin/add-products.php');
                 //stop the process
                 die();
               }

            }



          }else{
            $image_name="";//setting default value 
          }


          //insert into database

          $sql2="INSERT INTO products(title,price,image_name,stock,category_title,featured,active) 
            VALUES('$title', $price,'$image_name','$stock','$category_title','$featured','$active')
           ";

          $res2=mysqli_query($conn,$sql2);
          //redirect with message to manage products

          if($res2==TRUE){

            $_SESSION['add']="<div class='success'>Product Added Successfully</div>";
            // header("location:".$home.'admin/manage-products.php');
            ?>
    <script type="text/javascript">
    window.location = 'manage-products.php';
    </script>
    <?php
          }else{

            $_SESSION['add']="<div class='error'>Failed to Add</div>";
            // header("location:".$home.'admin/manage-products.php');
            ?>
    <script type="text/javascript">
    window.location = 'manage-products.php';
    </script>
    <?php
          }
          
        }
                  
      ?>

  </div>
</div>




<?php
//include('partials/footer.php');
?>