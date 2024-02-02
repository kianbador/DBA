<?php
    include('conn.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
</head>
<body>
    <?php include('head.php'); ?>

    <div class="container mt-5">        
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Brand</th>
                    <th>Price</th>
                    <th>Retail Price</th>
                    <th>Quantity</th>
                    <th>Supplier ID</th>
                    <th>Edit</th>
                    <th>Delete</th>

                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM product_tbl order by prod_name asc";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    }
                    else{
                        echo "Error: " . mysqli_error($conn);
                    }
                    foreach($data as $row){
                        echo '<tr>';
                            echo '<td>'.$row['prod_id'].'</td>';
                            echo '<td>'.$row['prod_name'].'</td>';
                            echo '<td>'.$row['prod_brand'].'</td>';
                            echo '<td> Php '.$row['price'].'</td>';
                            echo '<td> Php '.$row['retail_price'].'</td>';
                            echo '<td>'.$row['qty'].'</td>';
                            echo '<td>'.$row['supplier_id'].'</td>';
                            echo '<td class="text-center">';
                                echo '<a class="text-info text-center" href="edit.php?id='.$row['prod_id'].'"><i class="bi bi-pencil-square"></i></a>';
                            echo '</td>';
                            echo '<td class="text-center">';
                                echo '<a class="text-info" href="delete.php?id='.$row['prod_id'].'"><i class="bi bi-trash-fill"></i></a>';
                            echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>