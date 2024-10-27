<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">

    <br>
    <br>
    <br>
    <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <!-- <span class="dashboard">Dashboard</span> -->
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

    <table class="tbl-full">
      <tr>
        <th colspan="12" style="text-align:left;">Manage Order</th>
      </tr>
      <tr>
        <th class="text-center">S.N</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Contact</th>
        <th class="text-center">Email</th>
        <th class="text-center">Address</th>
        <th class="text-center">Product</th>
        <th class="text-center">Price</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Total</th>
        <th class="text-center">Order Date</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>

      <?php
          
            $sql="SELECT * FROM orders ORDER BY id DESC";

            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            $sn=1;

            if($count>0){

              while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $product=$row['product'];
                $price=$row['price'];
                $qty=$row['qty'];             
                $total=$price*$qty;
                $order_date=$row['order_date'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
                ?>
      <tr class="container hover">
        <td class="text-center"><?php echo $sn++; ?></td>
        <td class="text-center"><?php echo $customer_name; ?></td>
        <td class="text-center"><?php echo $customer_contact; ?></td>
        <td class="text-center"><?php echo $customer_email; ?></td>
        <td class="text-center"><?php echo $customer_address; ?></td>
        <td class="text-center"><?php echo $product; ?></td>
        <td class="text-center"><?php echo $price; ?></td>
        <td class="text-center"><?php echo $qty; ?></td>
        <td class="text-center">Rs.<?php echo $total; ?></td>
        <td class="text-center"><?php echo $order_date; ?></td>
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
          <a href="<?php echo $home; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>
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