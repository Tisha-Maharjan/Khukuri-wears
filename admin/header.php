<?php
include('../config/include.php');
include('partials/logincheck.php');
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

  <link rel="stylesheet" href="../css/admincss.css" />

  <link rel="stylesheet" href="../css/admin.css" />

  <link rel="stylesheet" href="../css/general.css" />

  <link rel="stylesheet" href="style.css" />

  <link rel="stylesheet" href="css/queries.css" />


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

  <!-- <script defer src="../admin-javascript/script.js"></script> -->
  <link rel="stylesheet" href="../admin-css/styles.css?v=<?php echo time(); ?>" />
</head>

<body>

  <div class="dashboard">
    <div class="header">
      <button id="toggleMenu">Toggle Menu</button>
    </div>

    <nav class="sidebar" id="sidebar">
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </nav>

    <div class="content">
      <!-- Your content goes here -->
      <h1>Main Content</h1>
      <p>Welcome to the admin dashboard!</p>
    </div>
  </div>

  <script src="admin-javascript/script.js"></script>
</body>

</html>