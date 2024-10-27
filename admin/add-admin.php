<?php
include('navbar.php');
// include('partials/admin-header.php');
// include '../config/include.php';
?>

<div class="main-content">
  <div class="wrapper">

    <br><br>
    <?php
      if(isset($_SESSION['add'])){//check session set or not
        echo $_SESSION['add'];//display message
        unset($_SESSION['add']);//remove message
      }
    ?>

    <form action="" method="POST" class="add-form">
      <h2 class="heading-secondary center-text">Add Admin</h2>
      <div class="admin-form">

        <div class="fullname">
          <label class="add-label" for="fullname">Fullname</label><input class="add-box" name="full_name" id="fullname"
            type="text" placeholder="" required />
        </div>

        <br /><br /><br />


        <div class="username">
          <label class="add-label" for="username">Username</label><input class="add-box" name="username" id="username"
            type="text" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="password">
          <label class="add-label" for="password">Password</label><input class="add-box" name="password" id="password"
            type="password" placeholder="" required />
        </div>
      </div>


      <div class="login">
        <input type="submit" name="submit" class="add-admin-btn" value="Add Admin" />
      </div>
      
      
    </form>
  </div>
</div>

<?php
// include('partials/footer.php');
?>


<?php
   if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="INSERT INTO admin(full_name,username,password)
      values('$full_name','$username','$password')
    ";

    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
    if($res==TRUE){
      // echo "data inserted";
      $_SESSION['add']="<div class='success'>Admin Added Successfully</div>";
      header('location:'.$home.'admin/manage-admin.php');
    }else{
      // echo "error";
      $_SESSION['add']="<div class='error'>Failed to add Admin</div>";
      header("location:".$home.'admin/add-admin.php');
    }
   }
   
   

?>