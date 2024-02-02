<?php
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ElectroWorld IMS</title>
  <link rel="icon" href="img/logov1.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @font-face {
    font-family: 'raleway';
    src: url('font/Raleway-Regular.ttf') format('truetype');
    }
    body {
      font-family: 'raleway', sans-serif;
      background-image: url("img/4.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      height: 100vh; 
      margin: 0;
      overflow-x: hidden;
    }
    .custom-dropdown .dropdown-menu {
      left: 50% !important;
      transform: translateX(-50%);
    }
    .img-thumbnail{
      background-color: transparent;
      border: none;
    }
    .username{
      color: white;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="menu.php"><img src="img/logov1.png" alt="Image" class="img-thumbnail" width="80" height="80"><img src="img/logo.png" alt="Image" class="img-thumbnail" width="150" height="50"></a>
      </li>
    </ul>

    <div class="mx-3">   

  <div class="dropdown custom-dropdown">
    <button type="button" class="btn btn-outline-dark dropdown-toggle text-light" data-bs-toggle="dropdown">
      <?php echo $username; ?>
      <img src="img/person-fill.png" alt="Image" class="img-thumbnail" width="30" height="30">
    </button>
    <ul class="dropdown-menu text-center">
      <li><a class="dropdown-item btn btn-outline-dark" href="profile.php">Profile</a></li>
      <li><a class="dropdown-item mt-2 btn btn-outline-dark" href="transactions.php">Transactions</a></li>
      <li><a class="btn btn-outline-dark mt-2" href="login.php">Log out</a></li>
    </ul>
  </div>
</div>

  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>