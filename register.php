<?php 

    include('conn.php');
    $fname = $lname = $email = $user = $domain = $username = $password = $tpassword = ''; 
    $errors = array('fname'=>'', 'lname'=>'', 'email'=>'', 'username'=>'','password'=>'', 'tpassword'=>'');

    if(isset($_POST['submit'])){
        if (isset($_POST['fname'])) {
            $fname = $_POST['fname'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
                $errors['fname'] = "must be letters only";
            }
        }

        if (isset($_POST['lname'])) {
            $lname = $_POST['lname'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
                $errors['lname'] = "must be letters only";
            }
        }

        if (isset($_POST['user'])) {
            $user = $_POST['user'];
            if (isset($_POST['domain'])){
                $domain = $_POST['domain'];
                $email = $user.'@'.$domain;
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = 'email must be valid';
                }
            }
        }

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $stmt = $conn->prepare("SELECT username FROM staff_tbl WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($resultUsername);
            $stmt->fetch();
            if ($resultUsername) {
                $errors['username'] = "username is already taken";
            }
            $stmt->close();
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
            $length = strlen($password);

            if($length > 15){
                $errors['password'] = "the limit is 15 characters only";
            }
            
        }

        if (isset($_POST['tpassword'])) {
            $tpassword = $_POST['tpassword'];

            if($tpassword !== $password){
                $errors['tpassword'] = "password doesn't match";
            }
            
        }

        if(array_filter($errors)){
            // echo 'errors in the form';
        }else {

            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $email = mysqli_real_escape_string($conn, $email);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "Insert into staff_tbl(first_name, last_name, email, username, password) values ('$fname','$lname', '$email', '$username', '$password')";

            if(mysqli_query($conn, $sql)){
                header('Location: login.php');
            }else{
                echo 'Query Error: '.mysqli_error($conn);
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
      background-image: url('img/bg1.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh; 
      margin: 0;
    }
    .card {
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.3);
      width: 500px;
      margin: 0 auto; 
    }
  </style>
</head>
<body>
    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
    <div class="card p-2">
        <div class="card-body">
        <div class="justify-content-start">
            <div>
            <form class="needs-validation" novalidate action="register.php" method="POST">
                <div class="row mb-2">
                    <div class="col-6">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" id="fname" name='fname' value= "<?php echo $fname ?>" required>
                        <div class="small text-danger">
                            <small><?php  echo $errors['fname'] ?></small>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" id="lname" name='lname' value= "<?php echo $lname ?>" required>
                        <div class="small text-danger">
                            <small><?php  echo $errors['lname'] ?></small>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="anon123" id="user" name='user' value= "<?php echo $user ?>" required>
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" placeholder="example.com" id="domain" name='domain' value= "<?php echo $domain ?>" required>
                    </div>
                    <div class="small mb-2 text-danger">
                            <small><?php  echo $errors['email'] ?></small>
                        </div>

                </div>
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username..." name='username' value= "<?php echo $username ?>" required>
                </div>
                <div class="mb-2 small text-danger">
                                <small><?php  echo $errors['username'] ?></small>
                            </div>
            
                
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password..." name='password' value= "<?php echo $password ?>" required>
                <div class="mb-2 small text-danger">
                            <small><?php  echo $errors['password'] ?></small>
                        </div>

                <label for="t-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="t-password" placeholder="Confirm password..." name='tpassword' value= "<?php echo $tpassword ?>"  required>
                <div class="mb-3 small text-danger">
                            <small><?php  echo $errors['tpassword'] ?></small>
                        </div>
                
                <div>
                    <a href="login.php" class="btn btn-dark">Go Back</a>
                    <button type="submit" name="submit" class="btn btn-outline-dark">REGISTER</button>
                </div>
            </form>

        </div>
        </div>
    </div>
    </div>
    <script src="valid.js"></script>
</body>
</html>