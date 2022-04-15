<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap"
      rel="stylesheet"
    />

   <link rel="icon" href="./images/cone.jpg"/>
    <title>BeautifulU</title>
    <link rel="stylesheet" href="client.css" />
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"><img src="./images/cone-removebg-preview.png" width="90px"></a>
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
                <li><a class="dropdown-item" href="catalogue1.php">Skin Care</a></li>
                <li><a class="dropdown-item" href="catalogue2.php">Parfum</a></li>
              </ul>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./logout.php">Log out</a>
          </li>
          </ul>

          <form class="d-flex" action="./search.php" method="POST">
          <input class="form-control me-2" type="search" placeholder="Product name" aria-label="Search" name="search">
          <button class="btn btn-dark" type="submit">Search</button>
        </form>
        <div class="p-3 d-flex">
            <a class="btn " aria-current="page" href="cart.php" name="cart">View Cart</a>
          </div>

        </div>
      </div>
    </nav>

