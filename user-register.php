<?php
 include 'config/include.php';
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
  <!-- <link rel="stylesheet" href="css/general.css" /> -->

  <link rel="stylesheet" href="css/style.css" />

  <link rel="stylesheet" href="css/queries.css" />

  <link rel="stylesheet" type="text/css" href="/css/style.css?v=<?php echo time(); ?>">
  <!-- <link rel="stylesheet" type="text/css" href="../css/admin.css"> -->
  <link rel="stylesheet" type="text/css" href="css/general.css?v=<?php echo time(); ?>">

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <script defer src="js/javascript.js"></script>
</head>

<body>

  <section class="user-register">
    <div class="register-container">
    <div class="container center-text ">
      <h2 class="heading-secondary-register">
        User Registration
      </h2>
      <?php
        if(isset($_SESSION['register'])){//check sesson set or not
          echo $_SESSION['register'];//display meassage
          unset($_SESSION['register']);//remove message
        }
        if(isset($_SESSION['taken'])){//check sesson set or not
          echo $_SESSION['taken'];//display meassage
          unset($_SESSION['taken']);//remove message
        }
      ?>
    </div>

    <form method="POST" class="main-register">

      <div class="register-form">
        <div class="fullname">
          <label for="fullname" class="fullname-label">
            Fullname
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="fullname-box" name="fullname" id="fullname" type="text" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="username">
          <label for="username" class="username-label">
            Username
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="username-box" name="username" id="username" type="text" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="password password-container">
          <label for="password" class="password-label">
            Password
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="password-box password-input" name="password" id="passwordField" type="password" placeholder=""
            required />
          <span class="eye-icon" id="togglePassword">&#x1F441;</span>
        </div>

        <br /><br /><br />

        <div class="phone">
          <label for="phone" class="phone-label">
            Phone Number
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="phone-box" name="phone" id="phone" type="number" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="email">
          <label for="email" class="email-label">
            Email
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="email-box" name="email" id="email" type="email" placeholder="" required />
        </div>

        <br /><br /><br />

        <div class="address">
          <label for="address" class="address-label">
            Address
          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="address-box" name="address" id="address" type="text" placeholder="" required />
        </div>
      </div>

      <div class="login">
        <button type="submit" name="submit" class="register-btn">Register </button>
        <div class="register-login">
          <p>Already registered?&nbsp;</p><a class="register-msg" href="user-login.php"> Login here</a>

        </div>
      </div>
    </form>
    </div>
  </section>

</body>

</html>

<?php
if(isset($_POST['submit'])){

  $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $address=$_POST['address'];

  $res1 = mysqli_query($conn,"SELECT * FROM user where username='$username' ");
    $count=mysqli_num_rows($res1);
    if($count>0){
      $_SESSION['taken']="<div class='error'>Username not available.</div>";
      header("location:".$home.'user-register.php');
    }
    else{
      $sql="Insert into user(fullname, username, password, phone, email, address)
          VALUES('$fullname', '$username', '$password', '$phone','$email', '$address')";
      $result=mysqli_query($conn, $sql);
      if($result){
          // echo "Data inserted";
          $_SESSION['register']="<div class='success'>Registered Successfully</div>";
          header('location:user-login.php');
      }
      else{
          die("Data is not inserted due to ".mysqli_error($conn));
      }     
    }

}
?>