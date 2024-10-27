<?php
  // include('partials/admin-header.php')
  include('navbar.php');
?>

    <section class="home-section">
      <br><br><br>
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
      </nav>

      <?php
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }
        ?>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
            <?php
      //sql query
        $sql="SELECT * FROM category";
        //execute query
        $res=mysqli_query($conn, $sql);
        //count rows
        $count=mysqli_num_rows($res);
      ?>
      
              <div class="box-topic">Categories</div>
              <div class="number"><?php echo $count; ?></div>
              <!-- <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text"></span>
              </div> -->
            </div>
            <!-- <i class="bx bx-category-alt cart"></i> -->
            
            <i class='bx bx-category bx-tada cart' ></i>

            <!-- <svg class="cart" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: #333;transform: ;msFilter:;"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path></svg> -->
          </div>

          <div class="box">
            <div class="right-side">
            <?php
      //sql query
        $sql2="SELECT * FROM products";
        //execute query
        $res2=mysqli_query($conn, $sql2);
        //count rows
        $count2=mysqli_num_rows($res2);
      ?>
              <div class="box-topic">Products</div>
              <div class="number"><?php echo $count2; ?></div>
              <!-- <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div> -->
            </div>
            <i class='bx bx-closet bx-tada cart' ></i>
          </div>

          <div class="box">
            <div class="right-side">
            <?php
            $date=date('Y-m-d');
        //to select from cart_orders
        $sql3="SELECT * FROM cart_orders where order_date='$date'";
      //execute query
        $res3=mysqli_query($conn, $sql3);
      //count rows
        $count3=mysqli_num_rows($res3);
      ?>
              <div class="box-topic">Daily Order</div>
              <div class="number"><?php echo $count3; ?></div>
              <!-- <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div> -->
            </div>
            <i class='bx bx-shopping-bag bx-tada cart' ></i>
          </div>

          <div class="box">
            <div class="right-side">
            <?php
      $date=date('Y-m-d');
      $sql4="SELECT SUM(total_price) AS Tota FROM cart_orders WHERE status='Delivered' and order_date='$date'";

      //execute query
        $res4=mysqli_query($conn, $sql4);

      //get value
        $row4=mysqli_fetch_assoc($res4);

      //get total revenue
      $total_revenue=$row4['Tota'];
    ?>
              <div class="box-topic">Daily Revenue</div>
              <div class="number">Rs. <?php echo $total_revenue; ?></div>
              <!-- <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Down From Today</span>
              </div> -->
            </div>
            <i class='bx bx-rupee bx-tada cart' ></i>
          </div>

          <div class="box">
            <div class="right-side">
            <?php
      //sql query
        $sql5="SELECT SUM(stock) AS total_stock FROM products";
        //execute query
        $res5=mysqli_query($conn, $sql5);
        //count rows
      $count5=mysqli_fetch_assoc($res5);
        // total stock
    $total_stock = $count5['total_stock'];
      ?>
              <div class="box-topic">Stock</div>
              <div class="number"><?php echo $total_stock; ?></div>
              <!-- <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div> -->
            </div>
            <i class='bx bx-line-chart bx-tada cart' ></i>
          </div>

        </div>

        
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
