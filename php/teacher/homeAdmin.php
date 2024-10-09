<?php
    session_start();
    include('../../php/db_config.php');


    if(!isset($_SESSION['valid'])){
      header("Location: ../../index.html");
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN HOMEPAGE</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
    <style>
        .offcanvas {
            width: 300px !important;
        }

        .navbar {
            background-color: #f8f9fa;
        }

        .offcanvas-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .offcanvas-body {
            padding: 1rem;
        }

        .btn-outline-success {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .btn-outline-success:hover {
            background-color:#0056b3;
            border-color: #0056b3;
        }

        .offcanvas .nav-item {
            margin-bottom: 10px;
        }

        .offcanvas .nav-item a {
            color: #333;
            font-size: 16px;
        }

        .logout-link {
        color: red; 
        }
    
        .logout-link:hover {
        color: darkred; 
        }

        .offcanvas .nav-item a:hover {
            color: #0056b3;
            text-decoration: none;
        }
        
        .navbar-brand img {
            width: 150px;
        }

        .offcanvas-header h5 {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .navbar-toggler {
                position: absolute;
                right: 20px; 
                top: 5px;
            }
        }
        .hs-title{
          font: 44px rubik, sans-serif;
          margin: 100px 0px 0px;
          font-weight: bold;
        }

        .hs-des{
          font: 24px rubik, sans-serif;
          margin: 10px 0px 16px;
        }
    </style>
</head>
<body>
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-light fixed-top">
        <div class="container">
          <a class="navbar-brand"><img src="../../img/logo.png" alt="Readiculous" width=""></a>
          <form class="d-flex">
           
          </form>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

      <!-- Offcanvas Menu -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../../img/logo.png" alt="Readiculous" width="150"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#Home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../php/profile.php">Admin Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Feedback Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item-x">
              <a class="nav-link logout-link" href="../../php/logout.php">Logout</a>
            </li>            
          </ul>
        </div>
      </div>
  </header>

  <main>
    <!-- SECTION 1 -->
    <section class="text-light" id="Home" style="background-image: url(../../img/BG.jpg); background-repeat: no-repeat; background-size: cover;">
      <div class="container">
          <div class="row align-items-center">
              <div class="text-container col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 order-xxl-1 order-xl-1 order-lg-1 order-md-1 order-sm-1" style="padding-top: 150px; padding-bottom: 150px;">
                <h1 class="hs-title">Welcome Admin!</h1>
                <p class="hs-des">Complete, Automated Library Management Software</p>
              </div>
              <div class="image-container col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 order-xxl-2 order-xl-2 order-lg-2 order-md-2 order-sm-2">
                <img src="../../img/adminlogo.png" class="img-fluid" alt="Readiculous" style="max-width: 100%; height: auto;">
            </div>
          </div>
      </div>
    </section>

  </main>

 
  <script src="../../js/bootstrap.bundle.min.js" ></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>
</html>