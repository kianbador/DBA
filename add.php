<?php
include('conn.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$set_id = $prod_id = $prod_name = $prod_brand = $prod_price = $prod_retail = $prod_qty = '';

if (isset($_POST['submit'])) {
    if(isset($_POST['supplier_id'])){
        $supplier_id = $_POST['supplier_id'];
    }
    if (isset($_POST['id'])) {
        $prod_id = $_POST['id'];
    }
    if (isset($_POST['name'])){
        $prod_name = $_POST['name'];
    }
    if (isset($_POST['brand'])){
        $prod_brand = $_POST['brand'];
    }
    if (isset($_POST['price'])){
        $prod_price = $_POST['price'];
    }
    if (isset($_POST['r_price'])){
        $prod_retail = $_POST['r_price'];
    }
    if (isset($_POST['qty'])){
        $prod_qty = $_POST['qty'];
    }
    
    for ($i=0; $i < count($prod_id); $i++){
        $id = $prod_id[$i];
        $name = $prod_name[$i];
        $brand = $prod_brand[$i];
        $price = $prod_price[$i];
        $retail = $prod_retail[$i];
        $qty = (int)$prod_qty[$i];

        $total = $price * $qty;
        
        $username = mysqli_real_escape_string($conn, $username);
        $supplier_id = mysqli_real_escape_string($conn, $supplier_id);
        $id = mysqli_real_escape_string($conn, $id);
        $name = mysqli_real_escape_string($conn, $name);
        $brand = mysqli_real_escape_string($conn, $brand);
        $price = mysqli_real_escape_string($conn, $price);
        $retail = mysqli_real_escape_string($conn, $retail);
        $total = mysqli_real_escape_string($conn, $total);

        $stmt = $conn->prepare("SELECT prod_id FROM product_tbl WHERE prod_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($resultProdid);
        $stmt->fetch();
        $stmt->close();
        if ($resultProdid) {
            $sql = "Update product_tbl set qty = qty + $qty where prod_id = '$id'";
            if (mysqli_query($conn, $sql)) {
                $sql = "Insert into transaction_tbl (username, prod_id, total_payment) values ('$username','$id', '$total')";
                if (mysqli_query($conn, $sql)) {
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }else{
            $sql = "Insert into product_tbl (prod_id, prod_name, prod_brand, price, retail_price, qty, supplier_id) values ('$id', '$name', '$brand', '$price', '$retail', $qty, '$supplier_id')";
            if (mysqli_query($conn, $sql)) {
                $sql = "Insert into transaction_tbl (username, prod_id, total_payment) values ('$username','$id', '$total')";
                if (mysqli_query($conn, $sql)) {
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

    }
}
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .custom-input {
            border-radius: 5px; 
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
                    <select name="inputCount" class="form-control" onchange="this.form.submit()">
                        <option value="0">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    </div>

    <div class="container">
        <form action="add.php" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2 mb-5">
                            <label class="form-label mt-1">Supplier ID:</label>
                        </div>
                        <div class="col-2 ">
                            <input type="text" name='supplier_id' class="form-control value='<?php $supplier_id ?>'">
                        </div>
                    </div>

                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $selectedValue = isset($_POST['inputCount']) ? $_POST['inputCount'] : 0;

                    for ($i = 1; $i <= $selectedValue; $i++) {
                        echo "<div class='col-3'>";
                            echo '<h4> Product #'.$i.'</h4>';
                            echo '<div>';
                                echo '<label class="form-label mt-1">Product ID:</label>';
                                echo '<input type="text" name="id[]" class="form-control" placeholder="">';
                                echo '<label class="form-label mt-1">Product Name:</label>';
                                echo '<input type="text" name="name[]" class="form-control" placeholder="">';
                                echo '<label class="form-label mt-1">Product Brand:</label>';
                                echo '<input type="text" name="brand[]" class="form-control" placeholder="">';

                                echo '<div class="row mt-4">';
                                    echo '<div class="col-4">';
                                        echo '<label class="form-label mt-1">Price:</label>';
                                    echo '</div>';
                                    echo '<div class="col-8">';
                                        echo '<input type="number" name="price[]" step="any" class="form-control" placeholder="Php">';
                                    echo '</div>';
                                echo '</div>';

                                echo '<div class="row mt-4">';
                                    echo '<div class="col-4">';
                                        echo '<label class="form-label mt-1">Retail:</label>';
                                    echo '</div>';
                                    echo '<div class="col-8">';
                                        echo '<input type="number" name="r_price[]" step="any" class="form-control" placeholder="Php">';
                                    echo '</div>';
                                echo '</div>';

                                echo '<div class="row mt-4">';
                                    echo '<div class="col-4">';
                                        echo '<label class="form-label mt-1">Quantity:</label>';
                                    echo '</div>';
                                    echo '<div class="col-8">';
                                        echo '<input type="number" name="qty[]" class="form-control" min="1" max="100">';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
                
            </div>
            <button type="submit" name='submit' class="my-4 btn btn-primary">SUBMIT</button>
        </form>
    </div>
</body>
</html>