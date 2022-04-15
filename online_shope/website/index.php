<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['lastName'])) {
  //header("Location:  ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet" />
  <link rel="icon" href="./admin/images/cone-removebg-preview.png" />
  <link rel="stylesheet" href="style.css" />
  <title>BeautifulU</title>

  <style>
    * {
      font-family: 'Cairo', sans-serif;
      font-weight: bold;
      font-size: large;
      color: #000;
    }

    nav {
      margin: 0px 0px;
      padding: 0px 40px;
      height: 120px;
    }

    .navbar-brand {
      font-size: 40px;
      font-weight: bolder;
      color: #C3496E;
    }

    h2 {
      color: black;
      font-weight: bold;
      padding-top: 6px;
      font-size: 40px;
    }
    .p-3 .btn{
      color: white;
      background-color: #C3496E;
    }
    main{
    background-color: #f4ced8;
    margin-top: -25px;
    margin-bottom: -18px;
    padding: 8px;
  }
  i{
    color: black;
    padding: 5 px 10px;
    margin: 5px 10px;

}
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./admin/images/cone-removebg-preview.png" width="90px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./client/catalogue1.php">Skin Care</a></li>
              <li><a class="dropdown-item" href="./client/catalogue2.php">Parfum</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./client/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./client/logout.php">Log out</a>
          </li>
        </ul>

        <form class="d-flex" action="./client/search.php" method="POST">
          <input class="form-control me-2" type="search" placeholder="Product name" aria-label="Search" name="search">
          <button class="btn btn-dark" type="submit">Search</button>
        </form>

        <div class="p-3 d-flex">
            <a class="btn " aria-current="page" href="./client/cart.php" name="cart">View Cart</a>
          </div>
      </div>
    </div>
  </nav>
  <center>
    <?php
    include('index.html');
    ?>

  </center>
  <div class="text-center">
    <hr>
    <p> 
      Programmed by AHOUZI HASNAE 
        <br>
        <a href="./admin/index.php" class="fw-bold link-dark"> admin dashboard</a>
</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>