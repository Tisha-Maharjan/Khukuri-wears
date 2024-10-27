<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<!-- main content Section Starts -->
<div class="main-content">
  <div class="wrapper">

    <?php
          
          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }

          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }

          if(isset($_SESSION['user-not-found']))
          {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
          }
          
        ?>

    <br>
    <br>
    <br>
    <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Manage User</span>
          <!-- <a href="add-products.php" class="btn-primary add-button">Add Product </a> -->
   
   
        </div>
      </nav>
    <div>
      <table class='tbl-full'>
        <tr>
          <!-- <th colspan="7" style="text-align:left;">Manage User</th> -->
        </tr>
        <tr>
          <th>S.N</th>
          <th>Fullname</th>
          <th>Username</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
        <?php
            $sql="Select * FROM user";

            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
              $count=mysqli_num_rows($res);
              $sn=1; //create a variable and assign the value

              if($count>0){


                while($rows=mysqli_fetch_assoc($res)){
                  $id=$rows['id'];
                  $fullname=$rows['fullname'];
                  $username=$rows['username'];
                  $phone=$rows['phone'];
                  $email=$rows['email'];
                  $address=$rows['address'];

                  ?>
        <tr class="container hover">
          <td class="text-center"><?php echo $sn++; ?>.</td>
          <td class="text-center"><?php echo $fullname++; ?></td>
          <td class="text-center"><?php echo $username; ?></td>
          <td class="text-center"><?php echo $phone; ?></td>
          <td class="text-center"><?php echo $email; ?></td>
          <td class="text-center"><?php echo $address; ?></td>
          <td style="text-align: center;">
            <!-- <a href="<?php echo $home;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change
               Password</a> -->
            <a href="<?php echo $home;?>admin/update-user.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update
              User</a>
            <a href="<?php echo $home;?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete
              User</a>
          </td>
        <tr>
          <?php
                  
                }
              }
              else{

                //
            }

            }
              
          ?>
      </table>
    </div>
  </div>
</div>
<!-- main content Section ends -->
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