<?php
include('../config/include.php');
include('partials/logincheck.php');
?>
<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Khukuri Wears &mdash; Dare to Wear!</title>

    <link rel="icon" href="khukuriwears/favicon.png" />
  <link rel="apple-touch-icon" href="khukuriwears/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="navbar-style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    
    <link rel="stylesheet" href="../css/admin-new.css" />

<link rel="stylesheet" href="../css/general.css" />

<link rel="stylesheet" href="../css/queries.css" />
<script defer src="../js/script.js"></script>
  <link rel="stylesheet" href="../css/admin-new.css?v=<?php echo time(); ?>" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <a href="index.php">
        <i class="bx bxl-kickstarter"></i>
        <span class="logo_name">Khukuri Wears</span>
        </a>
      </div>

      <ul class="nav-links">

        <li>
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="manage-admin.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Admin</span>
          </a>
        </li>
        <li>
          <a href="manage-user.php">
            <i class="bx bx-group"></i>
            <span class="links_name">User</span>
          </a>
        </li>
        <li>
          <a href="manage-category.php">
            <i class="bx bx-category"></i>
            <span class="links_name">Category</span>
          </a>
        </li>
        <li>
          <a href="manage-products.php">
            <i class="bx bx-closet"></i>
            <span class="links_name">Products</span>
          </a>
        </li>
        <li>
          <a href="bulk_order.php">
            <i class="bx bx-shopping-bag"></i>
            <span class="links_name">Total Order</span>
          </a>
        </li>
        <li>
          <a href="manage-contact.php">
            <i class="bx bx-chat"></i>
            <span class="links_name">Feedback</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout-admin.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    
</div>

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      const navLinks = document.querySelectorAll('.nav-links li a');

      function removeAllActive() {
        navLinks.forEach(link => {
          link.parentNode.classList.remove('active');
        });
      }

      function setActive(link) {
        link.parentNode.classList.add('active');
      }

      navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
          removeAllActive();
          setActive(this);
        });
      });

      const currentURL = window.location.pathname;
      navLinks.forEach(link => {
        if (link.getAttribute('href') === currentURL) {
          removeAllActive();
          setActive(link);
        }
      });
    });
  </script> -->