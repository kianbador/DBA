<?php
    include('conn.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password === $cpassword){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];

            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "Update staff_tbl set first_name = '$fname', last_name = '$lname', email = '$email', password='$password' where username = '$username'";
            if (mysqli_query($conn, $sql)){
                header('Location: profile.php');
            }
            else{
                echo "Error updating record: " . mysqli_error($conn);
            }


        }else{
            echo '<script type="text/javascript">';
            echo "   alert(`Password doesn't match`);";
            echo '</script>';
        }

    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
</head>
<style>
    .container {
      width: 350px !important;
    }
    .custom-input {
            border-top: none;
            border-left: none;
            border-right: none;
            border-radius: 0 !important;
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
    .form-control {
            color: #383c44 !important;
            font-weight: bold;
        }
</style>
<body>
    <?php include 'head.php'; ?>
        
    <div class="container bg-dark text-light p-3 my-3">
            <form action="edit_profile.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-6">
                            <input type="" name="fname" class="form-control custom-input mt-4" placeholder="First Name" required>
                        </div>
                        <div class="col-6">
                            <input type="" name="lname" class="form-control custom-input mt-4" placeholder="Last Name" required>
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" class="form-control custom-input mt-4" placeholder="Email" required>
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" class="form-control custom-input mt-4" placeholder="Password" required>
                        </div>
                        <div class="col-12">
                            <input type="password" name="cpassword" class="form-control custom-input mt-4" placeholder="Confirm password" required>
                        </div>
                        <div class="text-center mt-4">
                        <a href="profile.php" class="btn btn-light">Go Back</a>
                        <button class="btn btn-outline-light" type="submit" name="submit">Submit</button>
                    </div>
                    </div>
            </form>
    </div>
    <script src="valid.js"></script>
</body>
</html>