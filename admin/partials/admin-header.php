<?php
include('../config/include.php');
include('logincheck.php');
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

  <!-- <link rel="stylesheet" href="../css/admincss.css" /> -->

  <link rel="stylesheet" href="../css/admin.css" />

  <link rel="stylesheet" href="../css/general.css" />

  <link rel="stylesheet" href="css/queries.css" />


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <script defer src="js/script.js"></script>
  <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>" />
</head>

<body>
  <header class="header">
    <a href="#">
      <img class="logo" alt="Khukuri Wears logo" src="../khukuriwears/khukuriwears-logo1.png" /></a>
    <nav class="main-nav">
      <ul class="main-nav-list">
        <li>
          <a class="main-nav-link" href="../admin/index.php">Home</a>
        </li>
        <li>
          <a class="main-nav-link" href="manage-admin.php">Admin</a>
        </li>
        <li>
          <a class="main-nav-link" href="manage-user.php">User</a>
        </li>
        <li>
          <a class="main-nav-link" href="manage-category.php">Category</a>
        </li>
        <li>
          <a class="main-nav-link" href="manage-products.php">Products</a>
        </li>
        <li>
          <a class="main-nav-link" href="bulk_order.php">Orders</a>
        </li>
        <li>
          <a class="main-nav-link" href="manage-contact.php">Feedback</a>
        </li>

        <li><a class="main-nav-link" href="logout-admin.php">
            <ion-icon class="header-icon" name="log-out-outline"></ion-icon>
          </a>
        </li>
        <!-- <li><a class="main-nav-link nav-login" href="login.php">Log in</a> -->
        </li>
      </ul>
    </nav>

  </header>