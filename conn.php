<?php 

    $conn = mysqli_connect('localhost', 'root','','db_inventory');

    if(!$conn){
        echo 'Connection error: '. mysqli_connect_error();
    }

?>