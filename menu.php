<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .n_ul{
            text-decoration: none !important;
            color: black !important;
        }
        .card{
            transition: background-color 0.4s;
            border-color: #aae5fc !important; 
        }
        .card:hover{
            background-color: #aae5fc;
        }
    </style>
</head>
<body>
    <?php include 'head.php'; ?>

    <div class="container-lg pt-1 mt-4">
        <div class="row my-5 align-items-center justify-content-center">
            <div class="col-4">
                <div class="card border-4">
                    <a class="n_ul "href="">
                        <div class="card-body text-center py-5 my-3">
                            <div>
                                <img src="img/add-file.png" class="img-thumbnail mb-1" width="100" height="100" alt="">
                                <h4 class="card-title">
                                    ADD RECORD
                                </h4>
                            </div>
                                
                                <p class="lead card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card border-4">
                    <a class="n_ul "href="">
                        <div class="card-body text-center py-5 my-3">
                            <div>
                                <img src="img/show.png" class="img-thumbnail mb-1" width="100" height="100" alt="">
                                <h4 class="card-title">
                                    SHOW RECORDS
                                </h4>
                            </div>
                                
                                <p class="lead card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-4">
                <div class="card border-4">
                    <a class="n_ul "href="">
                        <div class="card-body text-center py-5 my-3">
                            <div>
                                <img src="img/edit.png" class="img-thumbnail mb-1" width="100" height="100" alt="">
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