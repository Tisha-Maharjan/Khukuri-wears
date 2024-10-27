<?php
    include('header-after.php');
?>

<section class="section-purchase">
  <h2 class="heading-secondary">Purchase History</h2>

    <form action="" method="post" id="myForm"  style="float:right; padding-left:10px;">
        <input type="date" name="date" id="date">
    </form>
    

    <script>
        document.getElementById('date').addEventListener('change', function() {
            document.getElementById('myForm').submit();
        });
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the date value from the form submission
        $dateValue = $_POST["date"];

        echo "<p style='float:right; font-weight:500; font-size:1.6rem; '> Date: " . $dateValue."</p>";
        ?>
        <br><br><br>
        <?php
    }else{
      $dateValue = date("Y-m-d");
      // echo "Date: " . $dateValue;
      echo "<p style='float:right; font-weight:500; font-size:1.6rem; '> Date: " . $dateValue."</p>";
      ?>
      <br><br><br>
      <?php
    }
    ?>

    <div class="column-labels-purchase">
      
      <label class="purchase-details">Product</label>
      <label class="purchase-title">Total Price</label>
      <label class="purchase-title">Ordered Date</label>
      <label class="purchase-title">Payment Mode</label>
      <label class="purchase-title">Order Status</label>
    </div>

    
    
    <?php
      
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart_orders` WHERE user_id = '$user_id' and order_date='$dateValue'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
              $date=$fetch_cart['order_date'];
              // $dateOnly = date("Y-m-d", strtotime($date));
              // if($dateOnly==$dateValue){
              
                ?>  
                <div class="purchase">

                  <div class="purchase-details"><?php echo $fetch_cart['total_products']; ?></div>
                  
                  <div class="purchase-title"><?php echo $fetch_cart['total_price']; ?></div>

                  <div class="purchase-title"><?php echo $fetch_cart['order_date']; ?></div>

                  <div class="purchase-title"><?php echo $fetch_cart['payment_mode']; ?></div>

                  <div class="purchase-title"><?php echo $fetch_cart['status']; ?></div>
                </div>
                <?php
              // }         
            }
          }else{
              echo '<p class="empty" style="font-weight:bold; font-size: 20px; text-align:center">You have not made any purchase on '.$dateValue.'</p>';
          }
    ?>



</div>
</section>

<?php
  include("footer.php");
?>