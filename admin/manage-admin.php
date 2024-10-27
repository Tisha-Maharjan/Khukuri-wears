<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<!-- main content Section Starts -->
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

          if(isset($_SESSION['pwd-not-matched']))
          {
            echo $_SESSION['pwd-not-matched'];
            unset($_SESSION['pwd-not-matched']);
          }

          if(isset($_SESSION['change-pwd']))
          {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
          }
          
        ?>

<br><br><br>
<nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Manage Admin</span>
          <a href="add-admin.php" class="btn-primary add-button">Add Admin </a>
   
        </div>
      </nav>

    <!-- button to add admin -->
    

    <div>
      <table class='tbl-full'>
        <tr>
          <!-- <th colspan="4" style="text-align:left;">Manage Admin</th> -->
        </tr>
        <tr>
          <th>S.N</th>
          <th>Fullname</th>
          <th>Username</th>
          <th>Actions</th>
        </tr>
        <?php
            $sql="Select * FROM admin";

            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
              $count=mysqli_num_rows($res);
              $sn=1; //create a variable and assign the value

              if($count>0){


                while($rows=mysqli_fetch_assoc($res)){
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];

                  ?>
        <tr class="container hover">
          <td class="text-center"><?php echo $sn++; ?>.</td>
          <td class="text-center"><?php echo $full_name; ?></td>
          <td class="text-center"><?php echo $username; ?></td>
          <td style="text-align: center;">
            <a href="<?php echo $home;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change
              Password</a>
            <a href="<?php echo $home;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update
              Admin</a>
            <a href="<?php echo $home;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete
              Admin</a>
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