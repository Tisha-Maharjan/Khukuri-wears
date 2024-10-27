<?php
  include 'header-after.php';
  $user_id = $_SESSION['user_id'];
?>

<section class="section-products">
  <?php

$search=$_POST['search']; 

?>
  <div class="container center-text ">
    <h2 class="heading-secondary"><?php echo $search; ?>
    </h2>
    <div class="products-db margin-bottom-md">
      <?php
      $sql2="SELECT * FROM products WHERE title LIKE '%$search%' ";

      $res2=mysqli_query($conn,$sql2);

      $count2=mysqli_num_rows($res2);

      if($count2>0){
        //product available
        while($row=mysqli_fetch_assoc($res2)){

          $id=$row['id'];
          $title=$row['title'];
          $price=$row['price'];
          // $description=$row['description'];
          $image_name=$row['image_name'];
          ?>


      <div class="products">

        <?php
                      //check id image is available or not 
                        if($image_name==""){
                          echo "<div class='error'>Image not available</div>";
                        }else{
                          ?>

        <a href="product-detail-after.php?products_id=<?php echo $id; ?>"><img
            src="<?php $home; ?>img/products/<?php echo $image_name; ?>" alt="Image"
            class="img-responsive img-curve products-img" /></a>

        <?php
                        }

                      ?>

        <div class="products-content">
          <div>
            <h2 class="products-title"><?php echo $title; ?></h2>
          </div>
          <div>
            <h3 class="products-price">Rs.<?php echo $price; ?></h3>
          </div>

        </div>
      </div>


      <?php
            }
                
          

          }else{
            //product not available
            echo "<div class='error'>Product not available</div>";
          }
        
          ?>
    </div>
  </div>
</section>

<?php
include "footer.php";
?>