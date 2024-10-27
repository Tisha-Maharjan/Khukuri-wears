<?php
include('../config/include.php');
include('../partials/logincheck.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <!-- Your logo or branding -->
    </div>
    <ul class="menu">
      <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
      <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
      <!-- Add more menu items here -->
    </ul>
  </div>

  <div class="content">
    <!-- Your main content here -->
  </div>

  <script src="script.js"></script>
</body>
</html>
