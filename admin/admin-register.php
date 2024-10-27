<?php
  include ('../config/include.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="../css/login1.css">
</head>

<body>
  <div class="main">
    <div class="form">
      <p>Sign Up</p>

      <?php
      // if(isset($_SESSION['login'])){
      //   echo $_SESSION['login'];
      //   unset($_SESSION['login']);
      // }

      // if(isset($_SESSION['no-login-message'])){
      //   echo $_SESSION['no-login-message'];
      //   unset($_SESSION['no-login-message']);
      // }
    ?>

      <form action="" method="POST">
        <input type="text" name="full_name" placeholder="Fullname" class="btn-input">

        <input type="text" name="username" placeholder="Username" class="btn-input">

        <input type="date" name="dob" placeholder="Date Of Birth" class="btn-input">

        <input type="password" name="password" placeholder="password" class="btn-input">

        <input type="submit" name="submit" value="Sign Up" class="btnn">
        <p class="message">Already Registered? <a href="admin-login.php">Log In</a></p>
      </form>
    </div>
  </div>
</body>

</html>


<!-- <?php 

  //check whether the submit button is clicked or not
  // if(isset($_POST['submit'])){

    //get data from login form
    // $username=$_POST['username'];
    // $password=md5($_POST['password']);
    
    // $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // $res=mysqli_query($conn,$sql);

    // $count=mysqli_num_rows($res);

    // if($count==1){
      //user available and login success
    //   $_SESSION['login']="<div class='success'>Login Successfull.</div>";
    //   $_SESSION['user']=$username; //to check whether the user is logged in or not and logout will unset it


    //   header('location:'.$home.'admin/');

    // }
    // else{
      //user not available
//       $_SESSION['login']="<div class='error text-center'>Username or Password not matched.</div>";
//       header('location:'.$home.'admin/login.php');
//     }


//   }

// ?>