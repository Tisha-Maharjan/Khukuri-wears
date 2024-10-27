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
          
        ?>

    <!-- <br><br><br> -->

    <!-- button to add admin -->
    <br>
    <br>
    <br>
    <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Manage Feedback</span>
          <!-- <a href="<?php echo $home; ?>admin/add-category.php" class="btn-primary  add-button">Add Category </a> -->
   
        </div>
      </nav>
    <div>
      <table class='tbl-full'>
        <tr>
          <!-- <th colspan="5" style="text-align:left;">Manage Feedback</th> -->
        </tr>
        <tr>
          <th>S.N</th>
          <th>Fullname</th>
          <th>Email</th>
          <th>Message</th>
          <th>Actions</th>
        </tr>
        <?php
            $sql="Select * FROM contact";

            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
              $count=mysqli_num_rows($res);
              $sn=1; //create a variable and assign the value

              if($count>0){


                while($rows=mysqli_fetch_assoc($res)){
                  $id=$rows['id'];
                  $name=$rows['name'];
                  $email=$rows['email'];
                  $email=$rows['email'];
                  $message=$rows['message'];

                  ?>
        <tr class="container hover">
          <td class="text-center"><?php echo $sn++; ?>.</td>
          <td class="text-center"><?php echo $name; ?></td>
          <td class="text-center"><?php echo $email; ?></td>
          <td class="text-center"><?php echo $message; ?></td>
          <td style="text-align: center;">
            <a href="<?php echo $home;?>admin/delete-contact.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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