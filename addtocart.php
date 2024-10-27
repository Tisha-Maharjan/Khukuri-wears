<?php
 include('header-after.php');
//  include('../food/logincheck.php');

 $user_id = $_SESSION['user_id'];

 
 if (isset($_GET['status']) && $_GET['status'] === "Completed") {
  // Redirect to the desired page
  // header("Location: http://localhost/Khukuri-wears/index-after.php");
  ?>
<script type="text/javascript">
  window.location = 'http://localhost/Khukuri-wears/index-after.php';
  </script>
  <?php
  exit; // Ensure script execution stops after redirection
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    // header('location:addtocart.php');
    ?>
    <script type="text/javascript">
    window.location = 'addtocart.php';
    </script>
    <?php
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    // header('location:addtocart.php');
    ?>
    <script type="text/javascript">
    window.location = 'addtocart.php';
    </script>
    <?php
};

if(isset($_POST['update_quantity'])){
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';
}

?>


<section class="section-cart">
  <h2 class="heading-secondary">My Cart</h2>


  <div class="shopping-cart">

    <div class="column-labels">
      <label class="cart-image">Image</label>
      <label class="cart-details">Product</label>
      <label class="cart-size">Size</label>
      <label class="cart-price">Price</label>
      <label class="cart-quantity">Quantity</label>
      <label class="cart-removal">Remove</label>
      <label class="cart-line-price">Total</label>
    </div>

    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
    ?>

    <div class="cart">

      <div class="cart-image">
        <img src="img/products/<?php echo $fetch_cart['image_name']; ?>">
      </div>

      <div class="cart-details">
        <div class="cart-title"><?php echo $fetch_cart['title']; ?></div>
      </div>


      <div class="cart-title"><?php echo $fetch_cart['size']; ?></div>

      <div class="cart-price"><?php echo $fetch_cart['price']; ?></div>

      <div class="cart-quantity">
        <form action="" method="post">
          <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
          <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="cart_quantity" class="qty">
          <input type="submit" value="Update" class="update-cart" name="update_quantity">
        </form>
      </div>
      <div class="cart-removal">
        <!-- <a href="addtocart.php?delete=<?php echo $fetch_cart['id']; ?>"
          onclick="return remove()">
          <button class="remove-cart">
            Remove
          </button></a> -->

          <form class="remove-form" data-cart-id="<?php echo $fetch_cart['id']; ?>">
        <button class="remove-cart">Remove</button>
      </form>
      </div>
      <div class="cart-line-price"><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>
      </div>
    </div>
    <?php
    $grand_total += $sub_total;
        }
    }else{
        echo '<p class="empty" style="font-weight:bold; font-size: 20px; ">Your cart is empty</p>';
    }
    ?>

    <div><p style="text-align:left; font-size: 1.5rem;">Note: Please be advised that deliveries are scheduled to be completed within one week.</p></div>

  </div>
</section>
<div class="buttons">
  <div>
  <a class="go-back" href="category-after.php">
    <ion-icon name="arrow-back-outline" class="go-back-icon"></ion-icon>Continue Shopping
  </a>
  </div>
  <div class="payment-mode">
  <a href="checkout.php"><button class="checkout">Cash on Delivery</button></a><br>
  <form action="khalti.php" method="post">
    <input type="submit" class="khalti" value="Pay with Khalti">
  </form>
  
  </div>
</div>


<?php
include "footer.php";
?>

<script>
  // Update the JavaScript code to access the data attribute for cart ID
  document.querySelectorAll('.remove-form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      var button = this.querySelector('.remove-cart');
      var cartId = this.dataset.cartId; // Access the cart ID from data attribute

      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this item!",
        icon: "warning",
        buttons: ['Cancel', 'Yes, I am sure!'],
        dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
          swal("Deleted!", "Your item has been deleted.", "success").then(function() {
            // Append the cart ID to the URL when submitting the form
            window.location.href = "addtocart.php?delete=" + cartId;
            // form.submit();
          });
        } else {
          swal("Cancelled", "Your item is safe :)", "error");
        }
      });
    });
  });
</script>