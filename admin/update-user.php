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
      $sqll="Select * FROM user WHERE id=$id";

      $res=mysqli_query($conn,$sqll);
      
      if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count==1){
          //get details
          // echo "Admin Available";
          $row=mysqli_fetch_assoc($res);

          $fullname=$row['fullname'];
          $username=$row['username'];
          $phone=$row['phone'];
          $email=$row['email'];
          $address=$row['address'];
        }
        else{
          //redirext to manage page
          header('location:'.$home.'admin/manage-user.php');
        }
      }

    ?>

    <form action="" method="POST" class="add-form">
      <h2 class="update-user heading-secondary center-text">
        Update User
      </h2>
      <div class="center-container">
        <div class="add-category-form">

          <div class="fullname">
            <label class="update-admin-label" for="fullname">Fullname</label><input class="add-box" name="fullname"
              value="<?php echo $fullname; ?>" id="fullname" type="text" placeholder="" required />
          </div>

          <div class="username">
            <label class="update-admin-label" for="username">Username</label><input class="add-box" name="username"
              value="<?php echo $username; ?>" id="username" type="text" placeholder="" required />
          </div>

          <div class="phone">
            <label class="update-admin-label" for="phone">Phone Number</label><input class="add-box"
              value="<?php echo $phone; ?>" name="phone" id="phone" type="number" placeholder="" required />
          </div>

          <div class="email">
            <label class="update-admin-label" for="email">Email</label><input class="add-box"
              value="<?php echo $email; ?>" name="email" id="email" type="email" placeholder="" required />
          </div>

          <div class="address">
            <label class="update-admin-label" for="address">Address</label><input class="add-box"
              value="<?php echo $address; ?>" name="address" id="address" type="text" placeholder="" required />
          </div>

          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" name="submit" value="Update User" class="update-user-btn">
        </div>
      </div>
    </form>
  </div>
</div>

<?php

  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){
    // echo "Button clicked";
    echo $id=$_POST['id'];
    echo $fullname=$_POST['fullname'];
    echo $username=$_POST['username'];
    echo $phone=$_POST['phone'];
    echo $email=$_POST['email'];
    echo $address=$_POST['address'];

    $sql="Update user SET
    fullname = '$fullname',
    username='$username',
    phone = '$phone',
    email = '$email',
    address = '$address'
    WHERE id= '$id'
  ";

  // //execute the query
  $res=mysqli_query($conn,$sql);

  if($res==TRUE){
    //echo "Admin update successfully";
    $_SESSION['update']="<div class='success'>User Updated Successfully</div>";
    // header('location:manage-user.php');
    ?>
<script type="text/javascript">
window.location = 'manage-user.php';
</script>
<?php
  }
  else{
    //echo "failed to update admin";
      $_SESSION['update']="<div class='error'>Failed To Update User</div>";
      // header('location:manage-user.php');
      ?>
<script type="text/javascript">
window.location = 'manage-user.php';
</script>
<?php
  }
  }

  

?>

<?php
//include('partials/footer.php');

?>