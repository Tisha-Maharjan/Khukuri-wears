<?php

  include 'config/include.php';
  include('user-logincheck.php');
  $user_id = $_SESSION['user_id'];
  $fullname = $_SESSION['fullname'];
  
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
  <!-- <link rel="manifest" href="manifest.webmanifest" /> -->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/general.css?v=<?php echo time(); ?>" />

  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />

  <link rel="stylesheet" href="css/queries.css?v=<?php echo time(); ?>" />

  <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="css/checkout.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="css/purchase.css?v=<?php echo time(); ?>">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha384-ezCSmUg+Zl+FYtsEfrQ8uGmWYdxw9Uv4ZG4on+maXlLh/uaPJpuq+Tl5VIIkXr1i" crossorigin="anonymous"> -->

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <script defer src="js/javascript.js"></script>
</head>

<body>
  <header class="header">
    <a href="index-after.php">
      <img class="logo" alt="Khukuri Wears logo" src="khukuriwears/khukuriwears-logo1.png" /></a>

    <nav class="main-nav">
      <ul class="main-nav-list icon-list">
        <li>
          <a class="main-nav-link line" href="index-after.php">Home</a>
        </li>

        <li>
          <a class="main-nav-link" href="category-after.php">
            Men's Wear
            <div class="dropdown">

              <?php
      
      $sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes'";

          $res=mysqli_query($conn,$sql);

          $count=mysqli_num_rows($res);

          if($count>0){
            // echo "category available";
            while($row=mysqli_fetch_assoc($res)){

              $id=$row['id'];
              $title=$row['title'];
              $image_name=$row['image_name'];
              ?>
              <a class="line" href="<?php echo $home?>products-after.php?category_title=<?php echo $title;?>"> <?php echo $title; ?>
              </a><?php
          } } 
          ?>
            </div>
        </li>

        <li>
          <a class="main-nav-link" href="#">Welcome, <?php echo $fullname;?></a>
        </li>

        <li>
          <div class="search-container main-nav-link">
            <form action="<?php echo $home;?>product-search.php" method="POST">
              <input type="text" placeholder="Search..." name="search" class="search">
              <a href="#">
              <i>
                <ion-icon name="search-outline" class="search-icon"></ion-icon>
                </i>
              </a>
            </form>
          </div>
        </li>

        <li><a class="main-nav-link" href="addtocart.php">
            <ion-icon class="header-icon" name="cart-outline"></ion-icon>
            <?php
              $cart= mysqli_query($conn,"SELECT * from cart where user_id='$user_id'") or die("Query failed.");
              $cart_num=mysqli_num_rows($cart);
            ?>
            <span id="cart-count" class="cart-no"><?php echo $cart_num; ?> </span>
          </a>
        </li>

        <li><a class="main-nav-link" href="#">
            <ion-icon class="header-icon" name="person-outline">
            <div class="dropdown-account">
              <a href="purchase-history.php">Purchase History</a>
              <a href="user-logout.php">Logout</a>
        </div>
            </ion-icon>
          </a>
        </li>

      </ul>
    </nav>

    <!-- responsive -->
    <button class="btn-mobile-nav">
      <ion-icon name="menu-outline" class="icon-mobile-nav"></ion-icon>
      <ion-icon name="close-outline" class="icon-mobile-nav"></ion-icon>
    </button>

  </header>


</html>