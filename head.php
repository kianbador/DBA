<!DOCTYPE html>
<html lang="en">
<head>
  <title>IMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url("img/bg1.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
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
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active bg-info" href="#"><img src="img/nav-logo.png" alt="Image" class="img-thumbnail" width="160" height="80"></a>
      </li>
    </ul>

    <div class="mx-3">   

  <div class="dropdown custom-dropdown">
    <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown">
      <img src="img/person.png" alt="Image" class="img-thumbnail" width="50" height="50">
    </button>
    <ul class="dropdown-menu text">
      <li><a class="dropdown-item" href="#">Link 1</a></li>
      <li><a class="dropdown-item" href="#">Link 2</a></li>
      <li><a class="dropdown-item" href="#">Link 3</a></li>
    </ul>
  </div>
</div>

  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>