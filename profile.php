<?php
    include('conn.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $username = mysqli_real_escape_string($conn, $username);
    $sql = "select * from staff_tbl where username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
    $name = strtoupper($data[0]['first_name'].' '.$data[0]['last_name'] );

    $email = $data[0]['email'];
    $password = $data[0]['password'];
    $asterisks = str_repeat('*', strlen($password));
    list($user, $domain) = explode('@', $email, 2);
    $three = substr($user, 0, 3);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
</head>
<body>
    <?php include 'head.php'; ?>
        
    <div class="container bg-dark text-light p-3 mt-4">
            <div class="mt-2">
                <h4>Name: <?php echo $name; ?></h4>
            </div>
            <div class="mt-2">
                <h4>Username: <?php echo $username; ?></h4>
            </div>
            <div class="mt-2">
                <h4>Email: <?php echo $three.'***@'.$domain; ?></h4>
            </div>
            <div class="mt-2">
                <h4>Pasword: <?php echo $asterisks; ?></h4>
            </div>
    </div>
</body>
</html>