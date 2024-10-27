<?php
  include 'config/include.php';
//check whether the submit button is clicked or not
if(isset($_POST['submit'])){

  //get data from login form
  $username=$_POST['username'];
  $password=$_POST['password'];

  // retrieve data from session
  // $product_id = $_SESSION['product_id'];
  // $product_name = $_SESSION['product_name'];
  // $product_price = $_SESSION['product_price'];
  // $product_image = $_SESSION['product_image'];
  // $product_quantity = $_SESSION['product_quantity'];
  // $size = $_SESSION['size'];
  $pro_stat = $_SESSION['pro_stat'];
  
  $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";

  $res=mysqli_query($conn,$sql);

  $count=mysqli_num_rows($res);

  if($count==1){
    $rows=mysqli_fetch_assoc($res);
    $_SESSION['user_id']=$rows['id'];
    $user_id=$rows['id'];

    $rand_id=$_SESSION['rand_id'];
    //user available and login success
    // $_SESSION['login']="<div class='success'></div>";
    $_SESSION['username']=$username;
    $_SESSION['fullname']=$rows['fullname']; //to check whether the user is logged in or not and logout will unset it
    // $_SESSION['logged_in']=TRUE;
    if($pro_stat){
      $res1=mysqli_query($conn,"SELECT * FROM `cart_before` where rand_id='$rand_id'");
      $count1=mysqli_num_rows($res1);
      if($count1>0){
        while($rows1=mysqli_fetch_assoc($res1)){
          $product_id=$rows1['pid'];
          $product_name=$rows1['title'];
          $size=$rows1['size'];
          $product_price=$rows1['price'];
          $product_quantity=$rows1['quantity'];
          $product_image=$rows1['image_name'];
          mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, title, size, price, quantity, image_name) VALUES('$user_id', '$product_id', '$product_name','$size', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
          mysqli_query($conn,"DELETE FROM `cart_before` where rand_id='$rand_id'") or die('query failed');
        }
      }
      // $message[] = 'product added to cart';
      echo "<script>
      window.location='index-after.php';
      </script>";
    }else{
      header('location:index-after.php');
    }

  }
  else{
    //user not available
    $_SESSION['error']="<div class='error text-center'>Username or Password not matched.</div>";
    header('location:user-login.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <!-- without the line below, the css will not be responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="description"
    content="Khukuri Wears is a online clothing website for men's wear. It makes the shopping easier and fun." />

  <title>Khukuri Wears &mdash; Dare to Wear!</title>

  <link rel="icon" href="khukuriwears/favicon.png" />
  <link rel="apple-touch-icon" href="khukuriwears/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/general.css" />

  <link rel="stylesheet" href="css/style.css" />

  <link rel="stylesheet" href="css/queries.css" />


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <script defer src="js/javascript.js"></script>
</head>

<body>

  <section class="user-login">
    <div class="login-container">
    <div class="container center-text ">
      <ion-icon class="main-login-icon" name="person-circle"></ion-icon>
      <h2 class="heading-secondary">
        User Login
      </h2>
      <?php
      if(isset($_SESSION['register'])){
        echo $_SESSION['register'];
        unset($_SESSION['register']);
      }
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
    ?>
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

        <div class="password password-container">
          <label for="password">
            <ion-icon class="login-icon" name="lock-closed-outline"></ion-icon>
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <input class="password-box password-input" id="passwordField" name="password" type="password"
            placeholder="Password" required />

          <!-- <ion-icon name="eye-off-outline" class="eye-icon" id="togglePassword"></ion-icon> -->

          <span class="eye-icon" id="togglePassword">&#x1F441;</span>
        </div>

      </div>

      <div class="login">
        <button type="submit" name="submit" class="login-btn">LOGIN</button>

        <div class="register-login">
          <p>Don't have an account?&nbsp;</p><a class="register-msg" href="user-register.php"> Register here</a>

        </div>
      </div>
    </form>
    </div>
  </section>

</body>

</html>