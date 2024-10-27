<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">

    <?php
    
      if(isset($_GET['id'])){

        $id=$_GET['id'];

        $sql="SELECT * FROM cart_orders WHERE id=$id";

        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1){
          //detail found
          $row=mysqli_fetch_assoc($res);

          $customer_name=$row['name'];
          $customer_contact=$row['phone'];
          $customer_email=$row['email'];
          $customer_address=$row['address'];
          $price=$row['total_price'];
          $payment_mode=$row['payment_mode'];
          $status=$row['status'];
          
        }else{
          //not available
          header('location:'.$home.'admin/bulk_order.php');
        }

      }else{

        header('location:'.$home.'admin/bulk_order.php');
      }
    
    ?>

    <form action="" method="POST" class="add-form">
      <h2 class="update-order heading-secondary center-text">Update Order</h2>
      <div class="center-container">
        <div class="update-order-form">

          <div class="title">
            <label class="add-product-label" for="name">Customer Name</label><input class="add-box" name="customer_name"
              value="<?php echo $customer_name; ?>" id="name" type="text" placeholder=""  />
          </div>

          <div class="number">
            <label class="add-product-label" for="number">Phone Number</label><input class="add-box"
              name="customer_contact" value="<?php echo $customer_contact; ?>" id="number" type="text" placeholder=""
               />
          </div>

          <div class="email">
            <label class="add-product-label" for="email">Email</label><input class="add-box" name="customer_email"
              value="<?php echo $customer_email; ?>" id="number" type="email" placeholder=""  />
          </div>

          <div class="address">
            <label class="add-product-label" for="address">Address</label><input class="add-box" name="customer_address"
              value="<?php echo $customer_address; ?>" id="number" type="text" placeholder=""  />
          </div>

          <div class="payment_mode">
            <label class="add-product-label" for="payment_mode">Payment Mode</label><input class="add-box" name="payment_mode"
              value="<?php echo $payment_mode; ?>" id="number" type="text" placeholder=""  />
          </div>

          <div class="price">
            <label class="add-product-label" for="price">Price</label><input class="add-box" name="price"
              value="<?php echo $price; ?>" id="text" type="text" placeholder=""  />
          </div>

          <div class="status">
            <label class="add-product-label" for="status">Status</label><select name="status">
              <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
              <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
              <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
              <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
            </select>
          </div>

          <input type="hidden" name="id" value="<?php echo $id;?>">
          <input type="hidden" name="price" value="<?php echo $price;?>">

          <input type="submit" name="submit" value="Update Order" class="update-order-btn">

        </div>

      </div>
    </form>


    <?php 
      
        if(isset($_POST['submit'])){
          // echo "clicked";

          $id=$_POST['id'];
          $price=$_POST['price'];
          $status=$_POST['status'];
          $customer_name=$_POST['customer_name'];
          $customer_contact=$_POST['customer_contact'];
          $customer_email=$_POST['customer_email'];
          $customer_address=$_POST['customer_address'];
          $payment_mode=$_POST['payment_mode'];

          $sql2="UPDATE cart_orders SET

            total_price=$price,
            status='$status',
            name='$customer_name',
            phone='$customer_contact',
            email='$customer_email',
            address='$customer_address',
            payment_mode='$payment_mode'
            WHERE id=$id
          ";

          $res2=mysqli_query($conn,$sql2);

          if($res2==TRUE){
            //updated
            $_SESSION['update']="<div class='success'>Order Updated Successfully.</div>";
            // header('location:'.$home.'admin/bulk_order.php');
            ?>
    <script type="text/javascript">
    window.location = 'bulk_order.php';
    </script>
    <?php
          }else{
            //failed
            $_SESSION['update']="<div class='error'>Failed to Update Order.</div>";
            // header('location:'.$home.'admin/bulk_order.php');
            ?>
    <script type="text/javascript">
    window.location = 'bulk_order.php';
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