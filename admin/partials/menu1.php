<?php
include('../config/include.php');
include('logincheck.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin page</title>
    <!-- <link rel="stylesheet" href="../css/admin5.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="../demo/style.css?v=<?php echo time(); ?>" /> -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      />
      <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" /> -->

  <link rel="stylesheet" href="style.css" />

  <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" /> -->

  <!-- <link rel="stylesheet" href="../css/admincss.css" /> -->

  <!-- <link rel="stylesheet" href="../css/admin.css" /> -->

  <!-- <link rel="stylesheet" href="../css/general.css" /> -->

  <!-- <link rel="stylesheet" href="css/queries.css" /> -->


  <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script> -->

  <!-- <script defer src="js/script.js"></script> -->
  <!-- <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>" /> -->
  
  </head>
  <body>
    <div class="container-nav">
        <nav>
          <ul>
            <li>
              <a href="../index.php" class="logo">
                <span class="nav-item">Khukuri Wears</span>
              </a>
            </li>
            <!-- <li>
              <a href="index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
              </a>
            </li> -->
            <li>
              <a href="manage-admin1.php">
                <i class="fas fa-users-cog"></i>
                <span class="nav-item">Admin</span>
              </a>
            </li>
            <li>
              <a href="manage_user.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">Users</span>
              </a>
            </li>
            <li>
              <a href="manage-category.php">
                <i class="fas fa-layer-group"></i>
                <span class="nav-item">Category</span>
              </a>
            </li>
            <li>
                <a href="manage-food.php">
                  <i class="fas fa-hamburger"></i>
                  <span class="nav-item">Food</span>
                </a>
              </li>
            <li>
              <a href="bulk_order.php">
                <i class="fas fa-shopping-basket"></i>
                <span class="nav-item">Orders</span>
              </a>
            </li>
            <li>
              <a href="manage-table.php">
                <i class="fas fa-table"></i>
                <span class="nav-item">Table</span>
              </a>
            </li>
            <li>
              <a href="manage_booking.php">
                <i class="fas fa-book"></i>
                <span class="nav-item">Reservation</span>
              </a>
            </li>
            <li>
              <a href="manage-feedback.php">
                <i class="fas fa-comments"></i>
                <span class="nav-item">Feedback</span>
              </a>
            </li>
              <a href="logout.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
              </a>
            </li>
          </ul>
        </nav>

