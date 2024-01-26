<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    body {
      background-image: url('img/bg1.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh; 
      margin: 0;
    }
    .card {
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.3);
      width: 500px;
      margin: 0 auto; 
    }
  </style>
</head>
<body>
    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">
    <div class="card p-2">
        <div class="card-body">
        <div class="justify-content-start">
            <div>
            <form class="needs-validation" novalidate>
                <div class="row mb-2">
                    <div class="col-6">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" id="fname" required>
                    </div>
                    <div class="col-6">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" id="lname" required>
                    </div>
                </div>

                <div>
                    <label class="form-label">Email</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="anon123" id="user" required>
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" placeholder="example.com" id="domain" required>
                    </div>

                </div>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control mb-2" id="username" placeholder="Enter username..." required>
                
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-2" id="password" placeholder="Enter password..." required>

                <label for="t-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control mb-3" id="t-password" placeholder="Confirm password..." required>
                
                <div>
                    <a href="login.php" class="btn btn-dark">Go Back</a>
                    <button type="submit" class="btn btn-outline-dark">REGISTER</button>
                </div>
            </form>

        </div>
        </div>
    </div>
    </div>
    <script src="valid.js"></script>
</body>
</html>