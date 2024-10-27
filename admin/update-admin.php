<?php
// include('partials/admin-header.php');
include('navbar.php');

?>

<div class="main-content">
  <div class="wrapper">

    <br><br>

    <?php
      //get id of selected admin
      $id=$_GET['id'];

      //create sql to get details
      $sqll="Select * FROM admin WHERE id=$id";

      $res=mysqli_query($conn,$sqll);
      
      if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count==1){
          //get details
          // echo "Admin Available";
          $row=mysqli_fetch_assoc($res);

          $full_name=$row['full_name'];
          $username=$row['username'];
        }
        else{
          //redirext to manage page
          header('location:'.$home.'admin/manage-admin.php');
        }
      }

    ?>

    <form action="" method="POST" class="add-form">
      <h2 class="heading-secondary center-text">
        Update Admin
      </h2>

      <div class="admin-form">

        <div class="full_name">
          <label class="update-admin-label" for="full_name">Fullname</label><input class="add-box" name="full_name"
            id="full_name" type="text" placeholder="" required />
        </div>

        <br /><br /><br />


        <div class="username">
          <label class="update-admin-label" for="username">Username</label><input class="add-box" name="username"
            id="username" type="text" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="confirm-password">
          <label class="update-admin-label" for="confirm-password">Confirm Password</label><input class="add-box"
            name="confirm_password" id="confirm-password" type="password" placeholder="" required />
        </div>
      </div>


      <div class="login">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Update Admin" class="update-admin-btn">
      </div>

    </form>
  </div>
</div>

<?php

  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){
    // echo "Button clicked";
    echo $id=$_POST['id'];
    echo $full_name=$_POST['full_name'];
    echo $username=$_POST['username'];

    $sql="Update admin SET
    full_name = '$full_name',
    username = '$username' 
    WHERE id= '$id'
  ";

  // //execute the query
  $res=mysqli_query($conn,$sql);

  if($res==TRUE){
    //echo "Admin update successfully";
    $_SESSION['update']="<div class='success'>Admin Updated Successfully</div>";
    header('location:'.$home.'admin/manage-admin.php');
  }
  else{
    //echo "failed to update admin";
      $_SESSION['update']="<div class='error'>Failed To Update Admin</div>";
      header("location:".$home.'admin/manage-admin.php');
  }
  }

  

?>

<?php
//include('partials/footer.php');

?>