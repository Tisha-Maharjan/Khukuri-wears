<?php

include('header-after.php');

$user_id = $_SESSION['user_id'];


?>

<section class="section-checkout">
  <div class="container center-text ">
    <h2 class="heading-secondary">Checkout Form</h2>
  </div>

  <div class="checkout-main">

    <div class="checkout-form">
      <div class="form-payment">
        <form action="" method="POST">

          <h3 class="subheading-checkout">Billing Address</h3>

          <label class="add-label" for="full-name">Fullname</label>
          <input type="text" id="fname" class="add-box" name="fullname" placeholder=""><br />

          <label class="add-label" for="phone">Phone Number</label>
          <input type="phone" id="phone" class="add-box" name="phone" placeholder=""><br />

          <label class="add-label" for="email">Email</label>
          <input type="email" id="email" class="add-box" name="email" placeholder=""><br />

          <label class="add-label" for="address">Shipping Address</label>
          <input type="text" id="address" class="add-box" name="address" placeholder=""><br />

          <!-- <label class="add-label" for="address">City</label>
          <input type="text" id="city" class="add-box" name="city" placeholder=""><br /> -->


          <div class="checkout-btn">
            <!-- <input type="submit" name="order" value="Pay with Khalti" class="btn-khalti-method"> -->
            <input type="submit" name="order" value="Cash on Delivery" class="checkout">

          </div>

        </form>

        <!-- <form>
          <h3 class="subheading">Payment</h3>
        </form> -->
      </div>
    </div>


    <div class="display-order">
      <div class="order-cart">

        <div class="cart-value">
          <h3 class="cart-subheading">Cart</h3>
          <h3 class="cart-subheading">
            <ion-icon name="cart-outline"></ion-icon>
          </h3>
        </div>

        <div class="cart-detail">
          <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>

          <div class="cart-title-checkout">
            <?php echo $fetch_cart['title'] ?></div>

          <div class="cart-quantity-checkout">
            <?php echo 'Rs.'.$fetch_cart['price'].''.' x '.$fetch_cart['quantity']  ?>
          </div>

          <?php
        }
        }else{
            echo '<p class="empty">Your cart is empty</p> <br>';
            
        }
    ?>

          <hr />
          <hr />
          
          <div class="grand-total">Grand Total</div>
          <div class="grand-total">Rs.<?php echo $grand_total; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<?php
if(isset($_POST['order'])){

  $fullname = $_POST['fullname'];
  $phone =  $_POST['phone'];
  $email =  $_POST['email'];
  $status="Ordered"; //ordered,ondelivery, delivered, cancelled

  $address = $_POST['address'];
  // $order_date=date("Y_m_d h:i:sa");
  $order_date=date("Y_m_d");
  $payment_mode = "COD";
  $cart_total = 0;
  $cart_products[] = '';

  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
  $key_title = array();
  $value_quantity = array();

  if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
          $cart_products[] = $cart_item['title'].'- ('.$cart_item['quantity'].','.$cart_item['size'].');';
          $sub_total = ($cart_item['price'] * $cart_item['quantity']);
          $cart_total += $sub_total;
          $key_title[] = $cart_item['title'];
          $value_quantity[] = $cart_item['quantity'];
      }
  }
  // print_r($key_title);
  // print_r($value_quantity);
  $dict = array_combine($key_title, $value_quantity);
  // print_r($dict);
  $total_products = implode(' ',$cart_products);

  $order_query = mysqli_query($conn, "SELECT * FROM `cart_orders` WHERE name = '$fullname' AND phone = '$phone' AND email = '$email' AND status = '$status' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

  if($cart_total == 0){
      $message[] = 'Your cart is empty!';
  }elseif(mysqli_num_rows($order_query) > 0){

    ?>
      <script>
        swal("Order placed already!");
      </script>
      <?php
  }else{
      mysqli_query($conn, "INSERT INTO `cart_orders`(user_id, name, phone, email, address, total_products, total_price, order_date, payment_mode, status) VALUES('$user_id', '$fullname', '$phone', '$email', '$address', '$total_products', '$cart_total' ,'$order_date', '$payment_mode', '$status')") or die('query failed');

      foreach($dict as $key => $value){
        $res=mysqli_query($conn, "SELECT * FROM products WHERE title='$key'") or die('query failed');
        while($rows=mysqli_fetch_assoc($res)){
          $stock=$rows['stock'];
        }
        mysqli_query($conn, "UPDATE products set  stock=(stock-'$value') where title='$key'");
      }

      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    ?>
      <script>
        swal({
          title:"", 
          text: "Order placed successfully",
          icon:"success"
        }).then(function(){
          location.reload();
        });
      </script>
      <?php
  }
}

?>