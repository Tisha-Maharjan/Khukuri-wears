<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">

    <?php

          if(isset($_SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }

          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }

          if(isset($_SESSION['upload']))
          {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
          }

          if(isset($_SESSION['unauthorize']))
          {
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
          }

          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }

        ?>
 <br>
    <br>
    <br>
    <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Manage Product</span>
          <a href="add-products.php" class="btn-primary add-button">Add Product </a>
   
   
        </div>
      </nav>
    <!-- button to add admin -->
   

    <div>

      <table class='tbl-full'>
        <tr>
          <!-- <th colspan="8" style="text-align:left;">Manage Product</th> -->
        </tr>

        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Stock</th>
          <!-- <th>Status</th> -->
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>

        <?php
          
            $sql="SELECT * FROM products";

            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            $sn=1;

            if($count>0){

              while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];             
                $stock=$row['stock'];             
                // $status=$row['status'];             
                $featured=$row['featured'];
                $active=$row['active'];
                ?>
        <tr class="container hover">
          <td class="text-center"><?php echo $sn++; ?></td>
          <td class="text-center"><?php echo $title; ?></td>
          <td class="text-center"><?php echo $price; ?></td>
          <td class="text-center image"><?php 
                          if($image_name==""){
                            echo "<div class='error'>Image Not Added</div>";
                          }
                          else{
                            ?>

            <img src="<?php echo $home;?>img/products/<?php echo $image_name; ?>">
            <?php
                          }
                        ?>
          </td>

          <td class="text-center"><?php echo $stock; ?></td>
          <!-- <td class="text-center"><?php echo $status; ?></td> -->
          <td class="text-center"><?php echo $featured; ?></td>
          <td class="text-center"><?php echo $active; ?></td>
          <td style="text-align: center;">
            <a href="<?php echo $home; ?>admin/update-products.php?id=<?php echo $id; ?>" class="btn-secondary">Update
              Product</a>
            <a href="<?php echo $home; ?>admin/delete-products.php?id=<?php echo $id; ?>& image_name=<?php echo $image_name; ?>"
              class="btn-danger">Delete Product</a>
          </td>
        </tr>


        <?php
              }

            }else{

              echo"<tr>
                    <td colspan='7' class='error'>Product Not Added Yet</td>
                  </tr>";

            }

          ?>




      </table>
    </div>
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