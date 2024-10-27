<?php
  include 'config/include.php';
  //$user_id = $_SESSION['user_id'];
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


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <script defer src="js/javascript.js" type="text/javascript"></script>
</head>

<body>
  <header class="header">
    <a href="index.php">
      <img class="logo" alt="Khukuri Wears logo" src="khukuriwears/khukuriwears-logo1.png" /></a>
      <nav class="main-nav">
  <ul class="main-nav-list">
    <li>
      <a class="main-nav-link line" href="index.php">Home</a>
    </li>
    <li>
      <a class="main-nav-link line" href="index.php#mens-wear">Men's Wear</a>
    </li>
    <li>
      <a class="main-nav-link line" href="index.php#contact">Contact us</a>
    </li>
    <li>
      <a class="main-nav-link line" href="index.php#gallery">Gallery</a>
    </li>
    <li>
      <a class="main-nav-link nav-login" href="user-login.php">Log in</a>
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