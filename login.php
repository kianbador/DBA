<?php 
  include('conn.php');
  session_start();
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
              $_SESSION['username'] = $username;
              header('Location: menu.php');
              exit();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      height: 100vh; 
      margin: 0;
    }
    .img-thumbnail{
      background-color: transparent;
      border: none;
    }
    .btn{
      border-radius: 20px;
    }
    .card {
      width: 350px;
      margin: 0 auto; 
    }
    .custom-input {
            border-top: none;
            border-left: none;
            border-right: none;
            border-radius: 0;
            border-bottom: 2px solid #000;
            box-shadow: none !important;
        }
    .custom-input::placeholder {
            color: #383c44; 
            font-weight: bold;
        }
    .custom-input:focus {
            border-color: #383c44; 
            box-shadow: none; 
        }
    a{
            color: #383c44; 
            text-decoration: none; 

    }
    a:hover {
        color: #383c44;
        text-decoration: underline; 
    }
    .form-control {
      color: #383c44 !important;
            font-weight: bold;
        }
  </style>
</head>
<body>
<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
  <div class="card px-3">
    <div class="card-body">
    <div class="text-center">
          <img src="img/logov1.png" alt="logo" class="img-thumbnail" width="120" height="120">
        </div>
        <div class="card-title text-center mb-4">
          <p class="text-center font-weight-bold h4">Welcome!</p>
          <small class="text-center text-muted display-6">Please enter your details</small>
        </div>
      <div class="justify-content-start">
        <div>
          <form action="login.php" method="POST" class="needs-validation" novalidate>
            <div class="input-group">
              <input type="text" class="form-control custom-input" id="username" placeholder="Username" name='username' value= "<?php echo $username ?>" required>
            </div>
            <div class="mb-4 small text-danger">
              <small><?php  echo $errors['username'] ?></small>
            </div>

            <div class="input-group">
              <input type="password" class="form-control custom-input" id="password" placeholder="Password" name='password' required>
            </div>
            <div class="mb-4 small text-danger">
              <small><?php  echo $errors['password'] ?></small>
            </div>
            

            <div class="mb-3 text-center ">
              <button type="submit" name="submit" class="btn btn-block font-weight-bold btn-dark">Log in</button>
            </div>
          </form>
          <div class="text-center">
            <small>Don't have an account yet?</small>
            <a class="small font-weight-bold" href="register.php">Register</a>
          </div>
      </div>
    </div>
  </div>
</div>


<script src="valid.js"></script>
</body>
</html>