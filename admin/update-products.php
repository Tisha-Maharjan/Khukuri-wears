<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">


    <?php
      
      // check whether the3 id is set or not
      if(isset($_GET['id'])){

        // echo "Getting the data";
        $id=$_GET['id'];

        $sql2="SELECT * FROM products WHERE id=$id";

        $res2=mysqli_query($conn,$sql2);
     

        
          //get data
          $row2=mysqli_fetch_assoc($res2);

          $title=$row2['title'];
          // $description=$row2['description'];
          $price=$row2['price'];
          $current_image=$row2['image_name'];
          $stock=$row2['stock'];
          // $status=$row2['status'];
          $current_category=$row2['category_title'];
          $featured=$row2['featured'];
          $active=$row2['active'];

        }else{
        header("location:".$home.'admin/manage-products.php');
      }
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data" class="add-form">
      <h2 class="add-product heading-secondary center-text">Update Product</h2>
      <div class="center-container">
        <div class="update-product-form">

          <div class="title">
            <label class="add-product-label" for="title">Product Title</label><input class="add-box" name="title"
              value="<?php echo $title; ?>" id="title" type="text" placeholder="" required />
          </div>

          <!-- <div class="description">
            <label class="add-product-label" for="description">Description</label><textarea name="description" cols="30"
              rows="5" placeholder="" class="add-box"><?php echo $description;?></textarea>
          </div> -->

          <div class="price">
            <label class="add-product-label" for="price">Price</label><input class="add-box" name="price" id="price"
              value="<?php echo $price; ?>" type="text" placeholder="" required />
          </div>


          <div class="image">
            <label class="add-product-label" for="image">Current Image</label><?php
              if($current_image!=""){
                //display image
                ?>
            <img src="<?php echo $home;?>img/products/<?php echo $current_image;?>" width="100px">


            <?php

              }else{
                //error message
                echo "<div class='error'>Image Not Added</div>";

              }
            ?>
          </div>


          <div class="image">
            <label class="add-product-label" for="image">New Image</label><input class="add-box" name="image" id="image"
              type="file" placeholder="" />
          </div>

          <div class="stock">
            <label class="add-product-label" for="stock">Number of Stock</label><input class="add-box" name="stock"
              id="stock" value="<?php echo $stock; ?>" type="text" placeholder="" required />
          </div>

          <!-- <div class="status">
            <label class="add-product-label" for="status">Status</label>
            <select name="status" id="status">
              <option value="Available">Available</option>
              <option value="Unavailable">Unavailable</option>
            </select>
          </div> -->

          <div class="category">
            <label class="add-product-label" for="image">Category</label><select name="category">

              <?php

  $sql="SELECT * FROM category WHERE active='Yes'";

  $res=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($res);

  if($count>0){
    //available
    while($row=mysqli_fetch_assoc($res)){
      $category_title=$row['title'];
      $category_id=$row['id'];
      
      // echo "<option value='$category_id'>$category_title</option>";
      ?>
              <option <?php if($current_category==$category_title){echo "selected";}?>
                value="<?php echo $category_title;?>">
                <?php echo $category_title; ?></option>
              <?php
    }

  }else{
    //not available

    echo"<option value='0'>Category not available</option>";

  }
?>
            </select>
          </div>


          <div class="featured">
            <label class="add-product-label" for="featured">Featured</label>
            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes

            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
          </div>


          <div class="active">
            <label class="add-product-label" for="active">Active</label>
            <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes

            <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
          </div>

          <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <input type="submit" name="submit" class="update-product-btn" value="Update Product" />
        </div>

      </div>

    </form>

    <?php


      if(isset($_POST['submit'])){
        
        // echo "clicked";
        //get value from form
        $id=$_POST['id'];
        $title=$_POST['title'];
        // $description=$_POST['description'];
        $price=$_POST['price'];
        $current_image=$_POST['current_image'];
        $stock=$_POST['stock'];
        // $status=$_POST['status'];
        $category_title=$_POST['category'];
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
            $image_name="Product_Name_".rand(0000,9999).'.'.$ext;



            $src_path=$_FILES['image']['tmp_name'];

            $dest_path="../img/products/".$image_name;

            //upload the image
            $upload=move_uploaded_file($src_path,$dest_path);

            //check whether the image is uploaded or not
            //and if image is not uploaded then we will stop the process and redirect with error message
            if($upload==false){
              $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
              header("location:".$home.'admin/manage-category.php');
              die();//stop the process
            }
            
            //2.remove current image if available
            if($current_image!=""){
              $remove_path="../img/products/".$current_image;
              $remove=unlink($remove_path);

              //check if the image is removed or not 
              //if failed to remove dispaly message and stop process
              if($remove==FALSE){
                //failed to remove image
                $_SESSION['remove-failed']="<div class='error'>Failed to remove current image.</div>";
                header("location:".$home.'admin/manage-products.php');
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
        $sql3="UPDATE products SET 
          title='$title',
          price=$price,
          image_name='$image_name',
          stock='$stock',
          -- status='$status',
          -- status='$status',
          category_title='$category_title',
          featured='$featured',
          active='$active'
          WHERE id=$id
        ";
        
        //ececute query
        $res3=mysqli_query($conn,$sql3);

        //redirect to manage category with message
        if($res3==TRUE){
          //category updated
          $_SESSION['update']="<div class='success'>Product Updated Successfully</div>";
          // header("location:".$home.'admin/manage-products.php');
          ?>
    <script type="text/javascript">
    window.location = 'manage-products.php';
    </script>
    <?php

        }else{
          //failed to update category
          $_SESSION['update']="<div class='error'>Failed To Update Product</div>";
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
  //include('partials/footer.php')
?>