<?php
  include('partials/admin-header.php')
?>
<!-- main content Section Starts -->
<div class="main-content">
  <div class="container center-text ">
    <h2 class="heading-secondary">Dashboard</h2>

    <?php
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }
        ?>

    <div class="dashboard">
      <div class="col-4 text-center">
        <?php
      //sql query
        $sql="SELECT * FROM category";
        //execute query
        $res=mysqli_query($conn, $sql);
        //count rows
        $count=mysqli_num_rows($res);
      ?>

        <h1><?php echo $count; ?></h1> &nbsp;
        <p class="dashboard-text">Categories</p>
      </div>

      <div class="col-4 text-center">
        <?php
      //sql query
        $sql2="SELECT * FROM products";
        //execute query
        $res2=mysqli_query($conn, $sql2);
        //count rows
        $count2=mysqli_num_rows($res2);
      ?>
        <h1><?php echo $count2; ?></h1> &nbsp;
        <p class="dashboard-text">Products</p>
      </div>

      <div class="col-4 text-center">
        <?php
        //to select from cart_orders
        $sql3="SELECT * FROM cart_orders";
      //execute query
        $res3=mysqli_query($conn, $sql3);
      //count rows
        $count3=mysqli_num_rows($res3);
      ?>
        <h1><?php echo $count3; ?></h1> &nbsp;
        <p class="dashboard-text">Total Orders</p>
      </div>

      <div class="col-4 text-center">
        <?php
      
      $sql4="SELECT SUM(total_price) AS Tota FROM cart_orders WHERE status='Delivered'";

      //execute query
        $res4=mysqli_query($conn, $sql4);

      //get value
        $row4=mysqli_fetch_assoc($res4);

      //get total revenue
      $total_revenue=$row4['Tota'];
    ?>
        <h1>Rs.<?php echo $total_revenue; ?></h1> &nbsp;
        <p class="dashboard-text">Revenue Generated</p>
      </div>
    </div>
  </div>
</div>
<!-- main content Section ends -->