<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">
    <!-- <h1>Manage Order</h1> -->
    <br>
    <br>
    <br>
    <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Manage Orders</span>
          <!-- <a href="<?php echo $home; ?>admin/add-category.php" class="btn-primary  add-button">Add Category </a> -->
   
        </div>
      </nav>
    <?php
        
          if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
        ?>
    <br><br>

    <table class="tbl-full-order">
      <tr>
        <!-- <th colspan="11" style="text-align:left;">Manage Orders</th> -->
      </tr>
      <tr>
        <th class="text-center">S.N</th>
        <th class="text-center name">Customer Name</th>
        <th class="text-center number">Phone Number</th>
        <th class="text-center email">Email</th>
        <th class="text-center address">Address</th>
        <th class="text-center products">Products</th>
        <th class="text-center">Price</th>
        <th class="text-center order-date">Order Date</th>
        <th class="text-center">Payment Mode</th>
        <th class="text-center">Status</th>
        <th class="text-center">Actions</th>
      </tr>

      <?php
          
            $sql="SELECT * FROM cart_orders ORDER BY id DESC";

            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            $sn=1;

            if($count>0){

              while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $customer_name=$row['name'];
                $phone=$row['phone'];
                $email=$row['email'];
                $customer_address=$row['address'];
                $products=$row['total_products'];
                $price=$row['total_price'];
                $order_date=$row['order_date'];
                $payment_mode=$row['payment_mode'];
                $status=$row['status'];
                
                
                
                ?>
      <tr class="container hover">
        <td class="text-center"><?php echo $sn++; ?></td>
        <td class="text-center"><?php echo $customer_name; ?></td>
        <td class="text-center"><?php echo $phone; ?></td>
        <td class="text-center email"><?php echo $email; ?></td>
        <td class="text-center address"><?php echo $customer_address; ?></td>
        <td class="text-center products"><?php echo $products; ?></td>
        <td class="text-center"><?php echo $price; ?></td>
        <td class="text-center order-date"><?php echo $order_date; ?></td>
        <td class="text-center"><?php echo $payment_mode; ?></td>
        <td class="text-center">
          <?php 
                      //ordered,on delivery,delivered,canceled
                        if($status=="Ordered"){
                          echo "<label style='color: blue;'>$status</label>";
                        }
                        elseif($status=="On Delivery"){
                          echo "<label style='color: orange;'>$status</label>";
                        }

                        elseif($status=="Delivered"){
                          echo "<label style='color: green;'>$status</label>";
                        }

                        elseif($status=="Cancelled"){
                          echo "<label style='color: red;'>$status</label>";
                        }

                      ?>

        </td>

        <td>
          <a href="<?php echo $home; ?>admin/bulk_update.php?id=<?php echo $id; ?>" class="btn-secondary text-center">Update</a>
        </td>
      </tr>


      <?php
              }

            }else{

              echo"<tr>
                    <td colspan='12' class='error'>Order Not Placed Yet</td>
                  </tr>";

            }

          ?>


    </table>

  </div>

</div>
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
<?php
  //include('partials/footer.php')
?>