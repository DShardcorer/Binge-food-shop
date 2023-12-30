
<!--connect to file-->





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Binge's Food Shop">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Binge's Food Shop</title>
  <link rel="stylesheet" href="style.css">
  <!--bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--font awersome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">



  <style>
    body {
      overflow-x: hidden;
    }

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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
          </li>             <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price:$7.99/-</a>
            </li>


          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!--<button class="btn btn-outline-success" type="submit">Search</button> -->
            <input type="submit" class="btn btn-outline-success" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!--cart func-->
    <!-- second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">

      <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li><li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a> 
        </li>    </ul>
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
          <div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/marie-chicken-and-rice-1.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Marie Callender's Aged Cheddar Cheesy Chicken & Rice Bowl, Frozen Meal, 12 oz (Frozen)</h5>
          <p class='card-text card-description'>Take comfort food to the next level with Marie Callender's Cheesy Chicken & Rice Bowl. Tender chicken breast, rice and broccoli are topped with a rich cheese sauce for a tasty spin on a classic dish. Quick, convenient and ready in minutes, these microwaveable meals are ideal for weeknight dinners or anytime meals. Enjoy made-from-scratch flavor in minutes with Marie Callender's.</p>
          <p class='card-text card-description'>Price:$7.99</p>
          <a href='index.php?add_to_cart=4' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=4' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div><div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/Feastables-MrBeast-Original-Chocolate-Bar-2-1-oz-60g-1-bar_d0745983-d650-4010-9508-0398856c6191.746bd07e7ac9e3fd158847e047f26a44.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Feastables MrBeast Original Chocolate Bar, 2.1 oz (60g), 1 bar</h5>
          <p class='card-text card-description'>Feastables is on a mission to change the way you snack. We’ve created delicious snacks with ingredients you can trust. Founded by MrBeast (aka Jimmy Donaldson), our chocolate will not only level up your day, but it will leave you wondering how you can get</p>
          <p class='card-text card-description'>Price:$2.8</p>
          <a href='index.php?add_to_cart=1' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=1' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div><div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/Marie-Callender-s-Southern-Pecan-Pie-32-oz-Frozen_0fe3719a-b745-4bde-a19e-e9a39dfc0eed.96fbcb4fa419322be8bd2d16ebf95a75.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Marie Callender's Southern Pecan Pie, 32 oz (Frozen)</h5>
          <p class='card-text card-description'>Finish any meal with the comforting, homemade taste of Marie Callender's Pies. Treat family, friends, and yourself in a pinch with this delicious pecan pie, perfect for completing your Thanksgiving or Christmas dinner, or revisiting comforting holiday flavors any time of year. Savor this pie brimming with a sweet, luscious filling topped with crisp pecans. Flaky made-from-scratch crust makes each bite satisfying. Thaw while you're entertaining or preparing dinner and serve after for a treat that</p>
          <p class='card-text card-description'>Price:$1.99</p>
          <a href='index.php?add_to_cart=3' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=3' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div><div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/cookie-feast-1.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Feastables Mr Beast Peanut Butter Chocolate Chip Cookies, 6 oz</h5>
          <p class='card-text card-description'>Feastables is on a mission to change the way you snack. Founded by MrBeast in order to create delicious snacks with ingredients you can trust. Our snacks will not only level up your day, but it will leave you wondering how you can get your hands on more.</p>
          <p class='card-text card-description'>Price:$12</p>
          <a href='index.php?add_to_cart=5' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=5' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div><div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/frappu-starbuck1.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Starbucks Frappuccino Pumpkin Spice Chilled Coffee Drink, 13.7 Fl. Oz.</h5>
          <p class='card-text card-description'>Limited edition pumpkin spiceYour favorite frappuccino with the classic flavor of Fall13.7 ounce glass bottle</p>
          <p class='card-text card-description'>Price:$8.99</p>
          <a href='index.php?add_to_cart=7' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=7' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div><div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/hershey1.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Hershey's Special Dark Mildly Sweet Chocolate Giant Candy, Bar 7.56 oz, 25 Pieces</h5>
          <p class='card-text card-description'>It's all in the name! This HERSHEY'S SPECIAL DARK chocolate treat is made from delectable, rich dark chocolate that's been a classic for decades, HERSHEY'S SPECIAL DARK mildly sweet chocolate bars make life more delicious. Whether you enjoy this tasty giant size candy bar alone or shared with loved ones, one thing you can count on is experiencing the same great taste you know and love. This giant candy bar is the perfect treat for countless special and everyday occasions. They can be used to stu</p>
          <p class='card-text card-description'>Price:$2.59</p>
          <a href='index.php?add_to_cart=2' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=2' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div><div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/coca1.webp'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> Coca-Cola Soda Pop, 12 fl oz, 12 Pack Cans</h5>
          <p class='card-text card-description'>Soda. Pop. Soft drink. Sparkling beverage.Whatever you call it, nothing compares to the refreshing, crisp taste of Coca-Cola Original Taste, the delicious soda you know and love. Enjoy with friends, on the go or with a meal. Whatever the occasion, wherever you are, Coca-Cola Original Taste makes life’s special moments a little bit better.Carefully crafted in 1886, its great taste has stood the test of time. Something so delicious, so unique and so familiar, it’s what makes you think “Coca-Cola” </p>
          <p class='card-text card-description'>Price:$0.99</p>
          <a href='index.php?add_to_cart=6' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=6' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div>User Real IP Address - ::1

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
          <li class='nav-item'>
      <a href='index.php?brand=1' class='nav-link active text-center text-dark custom-text'>Walmart</a>
    </li><li class='nav-item'>
      <a href='index.php?brand=2' class='nav-link active text-center text-dark custom-text'>Feastable</a>
    </li><li class='nav-item'>
      <a href='index.php?brand=3' class='nav-link active text-center text-dark custom-text'>Mc Donald</a>
    </li><li class='nav-item'>
      <a href='index.php?brand=4' class='nav-link active text-center text-dark custom-text'>Hershey</a>
    </li><li class='nav-item'>
      <a href='index.php?brand=5' class='nav-link active text-center text-dark custom-text'>Marie Callender</a>
    </li><li class='nav-item'>
      <a href='index.php?brand=6' class='nav-link active text-center text-dark custom-text'>Coca Cola</a>
    </li><li class='nav-item'>
      <a href='index.php?brand=7' class='nav-link active text-center text-dark custom-text'>Starbucks</a>
    </li>        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item bg-secondary">
            <a href="" class="nav-link active text-center text-light custom-text">
              <h4>CATEGORY</h4>
            </a>
          </li>
          <li class='nav-item'>
            <a href='index.php?category=4' class='nav-link active text-center text-dark custom-text'>Frozen Food</a>
          </li><li class='nav-item'>
            <a href='index.php?category=5' class='nav-link active text-center text-dark custom-text'>Sweet</a>
          </li><li class='nav-item'>
            <a href='index.php?category=6' class='nav-link active text-center text-dark custom-text'>Fast Food</a>
          </li><li class='nav-item'>
            <a href='index.php?category=7' class='nav-link active text-center text-dark custom-text'>Beverage</a>
          </li>

        </ul>
      </div>
    </div>
  </div>



  <!--last child-->
  <!--include footer-->
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
        <a class="text-dark" href=https://github.com/DShardcorer/Binge-food-shop>Binge's Food Shop</a>
      </div>
      <!-- Copyright -->
    </footer>

  </div>

  <!--bootstrap js link-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>