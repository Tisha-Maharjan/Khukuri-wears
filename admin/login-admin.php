<?php
  include ('../config/include.php');
  // include '../header.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Login</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/admin-new.css?v=<?php echo time(); ?>">
  <!-- <link rel="stylesheet" type="text/css" href="../css/admin.css"> -->
  <link rel="stylesheet" type="text/css" href="../css/general.css?v=<?php echo time(); ?>">
</head>

<body>

  <section class="admin-login">
  <div class="login-container">
    <div class="container center-text ">
      <ion-icon class="main-login-icon" name="person-circle"></ion-icon>
      <h2 class="heading-secondary">
        Admin Login
      </h2>
    </div>

    <form method="POST" class="main-login">

      <div class="login-form">
        <div class="username">
          <label for="username">
            <ion-icon class="login-icon" name="person-outline"></ion-icon>
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="username-box" name="username" id="username" type="text" placeholder="Username" required />
        </div>

        <br /><br /><br />

        <div class="password">
          <label for="password">
            <ion-icon class="login-icon" name="lock-closed-outline"></ion-icon>
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="password-box" name="password" id="password" type="password" placeholder="Password" required />
        </div>
      </div>

      <div class="login">
        <button type="submit" name="submit" class="login-btn">LOGIN</button>
        <div class="register">
          <br/><br/><br/><br/>

        </div>
      </div>
      </div>
    </form>
    <div>

</section>
</body>

</html>


<?php

  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){

    //get data from login form
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="Select * FROM admin WHERE username='$username' AND password='$password'";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){
      //user available and login success
      $_SESSION['login']="<div class='success'></div>";
      $_SESSION['user']=$username; //to check whether the user is logged in or not and logout will unset it


      header('location:'.$home.'admin/');

    }
    else{
      //user not available
      $_SESSION['login']="<div class='error text-center'>Username or Password not matched.</div>";
      header('location:'.$home.'admin/login-admin.php');
    }


  }

?>