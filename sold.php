<?php
include('conn.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$error = array('','','','');

$set_id = $prod_id = $prod_name = $prod_brand = $prod_price = $prod_retail = $prod_qty = '';

if (isset($_POST['submit'])) {
    if (isset($_POST['id'])) {
        $prod_id = $_POST['id'];
    }
    if (isset($_POST['qty'])){
        $prod_qty = $_POST['qty'];
    }
    
    for($i=0; $i < count($prod_qty); $i++){
        $id = $prod_id[$i];
        $qty = (int)$prod_qty[$i];
        $stmt = $conn->prepare("SELECT prod_id, qty FROM product_tbl WHERE prod_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($resultProdid, $resultQty);
        $stmt->fetch();
        $stmt->close();
        if ($resultProdid){
            if($resultQty){
                $sqty = (int)$resultQty;
                if($sqty < $qty){
                    $error[$i] = 'Insufficient quantity';
                }
                else{
                    $error[$i] = '';
                }
            }
        }

    }

    if(array_filter($error, 'strlen') == []){
        for ($i=0; $i < count($prod_id); $i++){
            $id = $prod_id[$i];
            $qty = (int)$prod_qty[$i];
            
            $username = mysqli_real_escape_string($conn, $username);
            $id = mysqli_real_escape_string($conn, $id);
    
            $stmt = $conn->prepare("SELECT prod_id, retail_price FROM product_tbl WHERE prod_id = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt->bind_result($resultProdid, $resultRetail);
            $stmt->fetch();
            $stmt->close();
            if ($resultProdid) {
                $price = (float)$resultRetail;
                
                $total = $price * $qty;
                $total = mysqli_real_escape_string($conn, $total);
                $sql = "Update product_tbl set qty = qty - $qty where prod_id = '$id'";
                if (mysqli_query($conn, $sql)) {
                    $sql = "Insert into transaction_tbl (username, prod_id, total_payment, type) values ('$username','$id', '$total', 'sold')";
                    if (mysqli_query($conn, $sql)) {
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }else{
                echo "Error updating record";
            }
        }

    }
    else{
        echo '<script>alert("Error: Some products has insufficient quantity");</script>';
    }
}
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
    <style>
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
</head>
<body>
    <?php include 'head.php'; ?>
    <div class="container my-4">
    <form method="post" class="mb-3">
        <div class="row">
            <div class="col-2">
                <h6 class="form-label mt-2">No. of Products:</h6>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <select name="inputCount" class="form-select" onchange="this.form.submit()">
                        <option value="0">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    </div>

    <div class="container">
        <form action="sold.php" method="post" class="needs-validation" novalidate>
            <div class="row">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $selectedValue = isset($_POST['inputCount']) ? $_POST['inputCount'] : 0;
                    $query = "SELECT prod_id FROM product_tbl";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    }
                    else{
                        echo "Error: " . mysqli_error($conn);
                    }


                    for ($i = 1; $i <= $selectedValue; $i++) {
                        echo "<div class='col-3 bg-dark'>";
                            echo '<h4 class="text-light mt-4"> Product #'.$i.'</h4>';
                            echo '<div>';
                                echo '<select class="form-select" name="id[]" required>';
                                    echo '<option value="" disabled selected>Product ID</option>';
                                    foreach($data as $row){
                                        echo '<option value="'.$row['prod_id'].'">'.$row['prod_id'].'</option>';
                                    }
                                echo '</select>';

                                echo '<div class="row my-4">';
                                    echo '<div class="col-4">';
                                        echo '<label class="form-label mt-1 text-light">Quantity:</label>';
                                    echo '</div>';
                                    echo '<div class="col-8">';
                                        echo '<input type="number" name="qty[]" class="form-control custom-input" min="1" max="100" required>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
                <div class="col-12 text-start">
                    <button type="submit" name='submit' class="my-4 btn btn-lg btn-dark font-weight-bold">Submit</button>
                </div>

            </div>
        </form>
    </div>

    <script src="valid.js"></script>
</body>
</html>