<!--connect to file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Binge's Food Shop">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Binge's Food Shop</title>
  <link rel="stylesheet" href="style.css">
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--font awersome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">



  <style>
    .card-description {
      max-height: 100px;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .card-title {
      max-height: 50px;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>

</head>

<body>
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg bg-warning">
      <div class="container-fluid">
        <!--logo-->
        <img src="images/logo.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price</a>
            </li>


          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!-- second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
  </nav>
  <!--third child-->
  <div class="bg-light">
    <h3 class="text-center">Latest Products</h3>
    <p class="text-center">Explore well-famed food brands and pick your fill ! Let's get obese together !</p>
  </div>


  <!--fourth child-->
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <!--products-->
        <div class="row">
          <!--fecthing products from database-->
          <?php
                    if (isset($_GET['brand'])) {
                      get_unique_brands();
                    } elseif (isset($_GET['category'])) {
                      // Fetch products based on categories
                      get_unique_categories();
                    } else {
                      // Default: Fetch all products
                      getproducts();
                    }
          ?>


        </div><!--end of row-->
      </div>
      <div class="col-md-2 bg-warning text-dark">
        <!--side bar-->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item bg-secondary">
            <a href="" class="nav-link active text-center text-light custom-text">
              <h4>BRAND</h4>
            </a>
          </li>
          <?php
          getbrands();
          ?>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item bg-secondary">
            <a href="" class="nav-link active text-center text-light custom-text">
              <h4>CATEGORY</h4>
            </a>
          </li>
          <?php
          getcategories();
          ?>


        </ul>
      </div>
    </div>
  </div>



  <!--last child-->
  <div class="container my-5">
    <footer class="bg-warning">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4">
            <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">About Us</h5>
            <p>
              This is just an experimental E-commerce website built as the graduation research project of a humble
              student. Please have mercy sir :<. </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Links</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1">
                <a href="#!" style="color: #4f4f4f;">Frequently Asked Questions</a>
              </li>
              <li class="mb-1">
                <a href="#!" style="color: #4f4f4f;">Privacy Policy</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="mb-1" style="letter-spacing: 2px; color: #818963;">Working Hours</h5>
            <table class="table" style="color: #4f4f4f; border-color: #666;">
              <tbody>
                <tr>
                  <td>Mon - Fri:</td>
                  <td>8am - 9pm</td>
                </tr>
                <tr>
                  <td>Sat - Sun:</td>
                  <td>8am - 1am</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Github Source Code:
        <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>

  </div>


  <!--bootstrap js link-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>