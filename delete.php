<?php 
    include('conn.php');
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "Delete from product_tbl where prod_id = '$id'";
        if (mysqli_query($conn, $sql)){
            header('Location: show.php');
        }
        else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>