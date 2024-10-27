<?php
  include 'header-before.php';

  // $user_id = $_SESSION['user_id'];
  // $logged_in = $_SESSION['logged_in'];
  
  $rand_id=$_SESSION['rand_id'];

 
?>

<?php
//check if id is passed or not
if(isset($_GET['products_id'])){

    $products_id=$_GET['products_id'];

    $sql="SELECT title FROM products WHERE id=$products_id";

    $res=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($res);

    $products_title=$row['title'];

}else{

  header("location:".$home);
}
?>

<div class="section-details">

  <?php
     
        
          $sql2="SELECT * FROM products WHERE id=$products_id";

          $res2=mysqli_query($conn,$sql2);

          $count2=mysqli_num_rows($res2);

          if($count2>0){
            //product available
            while($row=mysqli_fetch_assoc($res2)){

              $id=$row['id'];
              $title=$row['title'];
              $price=$row['price'];
              $image_name=$row['image_name'];
              $stock=$row['stock'];
              // $category_id=$row['category_id'];
              $category_title=$row['category_title'];
              
              ?>

  <div class="detail-img">

    <?php
                      //check id image is available or not 
                        if($image_name==""){
                          echo "<div class='error'>Image not available</div>";
                        }else{
                          ?>

    <img src="<?php $home; ?>img/products/<?php echo $image_name; ?>" alt="Image"
      class="img-responsive img-curve products-img" />
    <?php
                        }

                      ?>
  </div>

  <div class="details">
    <div class="product-content">
      <div>
        <h2 class="product-title"><?php echo $title; ?></h2>
      </div>

      <div>
        <h3 class="product-price">Rs. <?php echo $price; ?></h3>
      </div>

      <div>
        <?php
  if($stock==0){
    ?>
        <p class="product-outofsize">Out of Stock</p>
        <?php
  }
  ?>
      </div>

      <div>
        <form action="" method="POST">

          <?php
          if($category_title === "Summer Collection" || $category_title === "Winter Collection"){
        ?>
          <div class="product-detail-size">
            <p class="product-size-title">Availabe sizes</p>
            <div class="product-size">
              <div class="size">
                <input type="radio" name="product_size" class="size-radio" id="size-s" value="S">
                <label for="s" data-variant="outline" class="size-label">S</label>
              </div>

              <div class="size">
                <input type="radio" name="product_size" class="size-radio" id="size-m" value="M">
                <label for="m" data-variant="outline" class="size-label">M</label>
              </div>

              <div class="size">
                <input type="radio" name="product_size" class="size-radio" id="size-l" value="L">
                <label for="l" data-variant="outline" class="size-label">L</label>
              </div>

              <div class="size">
                <input type="radio" name="product_size" class="size-radio" id="size-xl" value="XL">
                <label for="xl" data-variant="outline" class="size-label">XL</label>
              </div>
            </div>
          </div>
      </div>
      <?php
          }else if($category_title === "Footwear"){
        ?>
      <div class="product-detail-size footwear">
        <p class="product-size-title">Availabe sizes</p>
        <div class="product-size">
          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-s" value="36">
            <label for="s" data-variant="outline" class="size-label">36</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-m" value="37">
            <label for="m" data-variant="outline" class="size-label">37</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-l" value="38">
            <label for="l" data-variant="outline" class="size-label">38</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-xl" value="39">
            <label for="xl" data-variant="outline" class="size-label">39</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-xl" value="40">
            <label for="xl" data-variant="outline" class="size-label">40</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-xl" value="41">
            <label for="xl" data-variant="outline" class="size-label">41</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-xl" value="42">
            <label for="xl" data-variant="outline" class="size-label">42</label>
          </div>

          <div class="size">
            <input type="radio" name="product_size" class="size-radio" id="size-xl" value="43">
            <label for="xl" data-variant="outline" class="size-label">43</label>
          </div>
        </div>
      </div>
    </div>
    <?php
          }else{
    ?>
    <div class="product-detail-size">
      <p class="product-size-title">Availabe sizes</p>
      <div class="product-size">
        <div class="size">
          <!-- <input type="radio" name="product_size" class="size-radio" id="size-s" value="S"> -->
          <p class="size-label">None</p>
        </div>

      </div>
    </div>
  </div>
  <?php
      }
    ?>

  <div class="add-continue">

    <div class="addtocart">

      <input type="hidden" name="product_quantity" value="1" min="0" class="qty">
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">

      <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $row['image_name']; ?>">
      <?php
        if($stock>0){
          ?>
      <input type="submit" value="Add To Cart" name="add_to_cart" class="addtocart-btn">
      <?php
          }else{
            ?>
      <input type="submit" value="Add To Cart" name="add_to_cart_out" class="addtocart-btn">
      
      <?php
          }
      ?>
    </div>
    </form>


    <div class="continue">
      <a href="<?php echo $home?>category-after.php " class="continue-btn">Continue Shopping</a>
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
<script src="js/sweetalert.js"></script>

<?php
  if(isset($_POST['add_to_cart_out'])){
    ?>
      <script>
        swal("Item out of stock");
      </script>
      <?php
  }
?>

<?php
if(isset($_POST['add_to_cart'])){

  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  // Setting session 
  // $_SESSION['product_id'] =$_POST['product_id'];
  // $_SESSION['product_name'] = $_POST['product_name'];
  // $_SESSION['product_price'] = $_POST['product_price'];
  // $_SESSION['product_image'] = $_POST['product_image'];
  // $_SESSION['product_quantity'] = $_POST['product_quantity'];
  $_SESSION['pro_stat'] = TRUE;

  if(isset($_GET['products_id'])){

    $products_id=$_GET['products_id'];

    $sql3="SELECT * FROM products WHERE id=$products_id";

    $res3=mysqli_query($conn,$sql3);

      while($row=mysqli_fetch_assoc($res3)){
      $category_title=$row['category_title'];
      }
    
    if($category_title === "Summer Collection" || $category_title === "Winter Collection"){
      if(isset($_POST['product_size'])){
        $size = $_POST['product_size'];
        // $_SESSION['size'] = $_POST['product_size'];
      }else{
        $size = "S";
        // $_SESSION['size'] = "S";
      }
    } else if($category_title === "Footwear"){
      if(isset($_POST['product_size'])){
        $size = $_POST['product_size'];
        // $_SESSION['size'] = $_POST['product_size'];
      }else{
        $size = "36";
        // $_SESSION['size'] = "36";
      }
    }else{
      $size="None";
      // $_SESSION['size'] = "None";
    }
  }
    // echo "<script>
    //       window.location='user-login.php';    
    //     </script>";

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart_before` WHERE title = '$product_name' AND rand_id = '$rand_id' AND size = '$size'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
      // echo "<script>

      //   alert('Item already added to cart');
      //   window.location='category-before.php';
        
      //   </script>";
        ?>
      <script>
        swal("Item already added to cart");
      </script>
      <?php
        
    }else{

        mysqli_query($conn, "INSERT INTO `cart_before`(rand_id, pid, title, size, price, quantity, image_name) VALUES('$rand_id', '$product_id', '$product_name','$size', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        // $message[] = 'product added to cart';
        // echo "<script>

        // alert('Item added to cart. Login to view cart items.');
        // window.location='category-before.php';    
        // </script>";
        ?>
      <script>
        swal("Item added to cart. Login to view cart items.");
        // window.location='category-before.php'; 
      </script>
      <?php
    }
  }
?>

