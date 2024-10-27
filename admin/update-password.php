<?php
  // include('partials/admin-header.php');
  include('navbar.php');
?>

<div class="main-content">
  <div class="wrapper">

    <br><br>

    <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
      }
    ?>

    <form action="" method="POST" class="add-form">
      <h2 class="heading-secondary center-text">
        Change Password
      </h2>
      <div class="admin-form">

        <div class="current-password">
          <label class="update-password-label" for="current-password">Current Password</label><input class="add-box"
            name="current_password" id="current-password" type="password" placeholder="" required />
        </div>

        <br /><br /><br />


        <div class="new-password">
          <label class="update-password-label" for="new-password">New Password</label><input class="add-box"
            name="new_password" id="new-password" type="password" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="confirm-password">
          <label class="update-password-label" for="confirm-password">Confirm Password</label><input class="add-box"
            name="confirm_password" id="confirm-password" type="password" placeholder="" required />
        </div>
      </div>


      <div class="login">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Change Password" class="update-password-btn">
      </div>


    </form>


  </div>
</div>

<?php
  if(isset($_POST['submit'])){

    $id=$_POST['id'];
    $current_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];

    $sql="Select *FROM admin WHERE id=$id AND password='$current_password'";

    $res=mysqli_query($conn,$sql);

    if($res==TRUE){

      $count=mysqli_num_rows($res);

      if($count==1){
        //fine
        // echo "User Found";
        if($new_password==$confirm_password){

          // echo "Password matched.";
          $sqll="Update admin SET 
            password='$new_password'
            WHERE id=$id
          ";

          $ress=mysqli_query($conn,$sqll);

          if($res==TRUE){
            $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully .</div>";
            header("location:".$home.'admin/manage-admin.php');

          }else{
            $_SESSION['change-pwd']="<div class='error'>Failed To Change Password.</div>";
            header("location:".$home.'admin/manage-admin.php');
          }


        }else{
          $_SESSION['pwd-not-matched']="<div class='error'>Password Did Not Match.</div>";
          header("location:".$home.'admin/manage-admin.php');
        }


      }else{
        //error
        $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
        header("location:".$home.'admin/manage-admin.php');
      }


    }

  }

?>

<?php
  //include('partials/footer.php');
?>