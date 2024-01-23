

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
      background-image: url('img/bg.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh; 
      margin: 0;
    }
    .card {
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.5);
      width: 400px;
      margin: 0 auto; 
    }
    input{
      backdrop-filter: blur(5px);
      color: rgba(255, 255, 255, 0.5);
    }
  </style>
</head>
<body>
<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
  <div class="card p-3">
    <div class="card-body">
      <h5 class="card-title text-center">LOGIN</h5>
      <div class="justify-content-start">

        <div>
          <form>
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control mb-3" id="username" placeholder="Enter username...">

            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control mb-4" id="password" placeholder="Enter password...">

            <div class="mb-3 text-center ">
              <button type="submit" class="btn btn-block btn-outline-dark">LOGIN</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>