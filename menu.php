<?php
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroWorld IMS</title>
    <link rel="icon" href="img/logov1.png" type="image/x-icon">
    <style>
        .n_ul{
            text-decoration: none !important;
            color: black !important;
        }
        .card{
            border: none !important;
            transition: background-color 0.4s;
        }
        .card:hover{
            background-color: #212529;
            color: white !important;
        }
        .n_ul:hover{
            color: white !important;
        }
        .card:hover #invert-img{
            filter: invert(100%);
        }
    </style>
</head>
<body>
    <?php include 'head.php'; ?>

    <div class="container-lg pt-1 mt-4">
        <div class="row my-5 align-items-center justify-content-center">
            <div class="col-4">
                <div class="card">
                    <a class="n_ul "href="add.php">
                        <div class="card-body text-center py-5 my-3">
                            <div>
                                <img src="img/add1.png" class="img-thumbnail mb-1" width="100" height="100" alt="" id="invert-img">
                                <h4 class="card-title">
                                    ADD ITEMS
                                </h4>
                            </div>
                                
                                <p class="lead card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card">
                    <a class="n_ul "href="sold.php">
                        <div class="card-body text-center py-5 my-3">
                            <div>
                                <img src="img/sold.png" id="invert-img" class="img-thumbnail mb-1" width="100" height="100" alt="">
                                <h4 class="card-title">
                                    SOLD ITEMS
                                </h4>
                            </div>
                                
                                <p class="lead card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <a class="n_ul "href="show.php">
                        <div class="card-body text-center py-5 my-3">
                            <div>
                                <img src="img/edit1.png" id="invert-img" class="img-thumbnail mb-1" width="100" height="100" alt="">
                                <h4 class="card-title">
                                    EDIT OR DELETE
                                </h4>
                            </div>
                                
                                <p class="lead card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>