<?php
    include('conn.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $username = mysqli_real_escape_string($conn, $username);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
</head>
<body>
    <?php include 'head.php'; ?>
        
    <div class="container mt-5">
        <table class="table table-dark table-striped table-hover text-start">
        <thead>
                <tr>
                    <th>Transaction Number</th>
                    <th>Product ID</th>
                    <th>Date</th>
                    <th>Total Payment</th>
                    <th>Type</th> 
                </tr>
            </thead>
            <tbody>
            <?php 
                    $query = "SELECT * FROM transaction_tbl where username = '$username' order by transaction_no asc";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    }
                    else{
                        echo "Error: " . mysqli_error($conn);
                    }
                    foreach($data as $row){
                        echo '<tr>';
                            echo '<td>'.$row['transaction_no'].'</td>';
                            echo '<td>'.$row['prod_id'].'</td>';
                            echo '<td>'.$row['date'].'</td>';
                            echo '<td> Php '.$row['total_payment'].'</td>';
                            echo '<td>'.$row['type'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>