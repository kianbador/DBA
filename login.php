<?php 
  include('conn.php');
  $username = $password = ''; 
  $errors = array('username'=>'','password'=>'');

  if(isset($_POST['submit'])){
    if (isset($_POST['username'])){
      $username = $_POST['username'];
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $stmt = $conn->prepare("SELECT username, password FROM staff_tbl WHERE username = ?");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $stmt->bind_result($resultUsername, $resultPassword);
      $stmt->fetch();
      if ($resultUsername) {
          if (isset($_POST['password'])){
            $password = $_POST['password'];
            if ($password === $resultPassword){
              header('Location: menu.php');
            }
            else{
              $errors['password'] = 'wrong password'; 
            }
          }
      }
      else{
          $errors['username'] = "username doesn't exist";
      }
    }

  }


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    body {
      background-image: url("img/bg1.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh; 
      margin: 0;
    }
    .card {
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.3);
      width: 400px;
      margin: 0 auto; 
    }
    .img-thumbnail{
      background-color: transparent;
      border: none;
    }
  </style>
</head>
<body>
<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
  <div class="card py-1 px-3">
    <div class="card-body">
    <div class="text-center">
          <img src="img/logo-removebg-preview.png" alt="logo" class="img-thumbnail" width="100" height="100">
        </div>
      <h5 class="card-title text-center mb-4">INVENTORY MANAGEMENT SYSTEM</h5>
      <div class="justify-content-start">
        <div>
          <form action="login.php" method="POST" class="needs-validation" novalidate>
            <label for="username" class="form-label">Username:</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-person-fill"></i>
              </span>
              <input type="text" class="form-control" id="username" placeholder="Enter username..." name='username' value= "<?php echo $username ?>" required>
            </div>
            <div class="mb-4 small text-danger">
              <small><?php  echo $errors['username'] ?></small>
            </div>
            
            <label for="password" class="form-label">Password:</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-lock"></i>
              </span>
              <input type="password" class="form-control" id="password" placeholder="Enter password..." name='password' required>
            </div>
            <div class="mb-4 small text-danger">
              <small><?php  echo $errors['password'] ?></small>
            </div>
            

            <div class="mb-3 text-center ">
              <button type="submit" name="submit" class="btn btn-block btn-outline-dark">LOGIN</button>
            </div>
          </form>
          <div class="text-center">
            <small>Don't have an account yet?</small>
            <a class="small" href="register.php">Register</a>
          </div>
      </div>
    </div>
  </div>
</div>


<script src="valid.js"></script>
</body>
</html>