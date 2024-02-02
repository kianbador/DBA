<?php
    include('conn.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    if(isset($_POST['submit'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            if(isset($_POST['name'])){
                $name = $_POST['name'];
                if(isset($_POST['brand'])){
                    $brand = $_POST['brand'];
                    if(isset($_POST['price'])){
                        $price = $_POST['price'];
                        if(isset($_POST['rprice'])){
                            $retail = $_POST['rprice'];

                            $id = mysqli_real_escape_string($conn, $id);
                            $name = mysqli_real_escape_string($conn, $name);
                            $brand = mysqli_real_escape_string($conn, $brand);
                            $price = mysqli_real_escape_string($conn, $price);
                            $retail = mysqli_real_escape_string($conn, $retail);

                            $sql = "Update product_tbl set prod_name='$name', prod_brand='$brand', price='$price', retail_price='$retail' where prod_id = '$id'";

                            if (mysqli_query($conn, $sql)){
                                header('Location: show.php');
                            }
                            else{
                                echo "Error updating record: " . mysqli_error($conn);
                            }

                        }
                    }
                }
            }
        }
    }

    if(isset($_GET['id'])){

        $id = $_GET['id'];

    }



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
</head>
<style>
    .container {
      width: 350px !important;
    }
</style>
<body>
    <?php include('head.php'); ?>

    <div class="container mt-4">
        <div>
            <form action="edit.php" class="needs-validation" novalidate method="POST">
                <div class="bg-dark p-3">
                    <h4 class="text-center text-light">Update Product ID: <?php echo $id ; ?></h4>
                    <input type="text" name="name" class="form-control custom-input mt-4" placeholder="Product Name" required>
                    <input type="text" name="brand" class="form-control custom-input mt-4" placeholder="Product Brand" required>
                    <div class="row mt-4">
                        <div class="col-3">
                            <label class="form-label mt-1 text-light">Price:</label>
                        </div>
                        <div class="col-9">
                            <input type="number" name="price" step="any" class="form-control custom-input" placeholder="Php" required> 
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <label class="form-label mt-1 text-light">Retail:</label>
                        </div>
                        <div class="col-9">
                            <input type="number" name="rprice" step="any" class="form-control custom-input" placeholder="Php" required> 
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </div>
                    <div class="text-center mt-4">
                        <a href="show.php" class="btn btn-light">Go Back</a>
                        <button class="btn btn-outline-light" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script src="valid.js"></script>
</body>
</html>