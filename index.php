<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
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
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li> ";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>Profile</a>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:$<?php total_cart_price(); ?>/-</a>
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
    <?php
    cart();
    ?>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
              </li>";
            } else {
                echo "<li class='nav-item'>
                        <a class='nav-link' href=''>Welcome " . $_SESSION['username'] . "!</a> 
                    </li>";
            }

            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>Login</a> 
              </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/logout.php'>Logout</a> 
              </li>";
            }
            ?>
        </ul>
    </nav>
    <!--third child-->
    <div class="bg-light">
        <h3 class="text-center">Latest Products</h3>
        <p class="text-center">Explore well-famed food brands and pick your fill! Let's get obese together!</p>
    </div>

    <!--fourth child-->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <?php
                    if (isset($_GET['brand']) || isset($_GET['category']) || isset($_GET['min_price']) || isset($_GET['max_price'])) {
                        // Display the filter form and filtered products
                        filterProducts();
                    } else {
                        // Default: Fetch all products
                        getproducts();
                    }
                    ?>
                </div><!-- end of row -->
            </div>
            <div class="col-md-2 bg-warning text-dark">
                <!-- sidebar with filters -->
                <form method="get" action="index.php">
                    <!-- Brand filter -->
                    <div class="mb-3">
                        <h4>BRAND</h4>
                        <?php
                        getbrandsAsCheckboxes();
                        ?>
                    </div>

                    <!-- Category filter -->
                    <div class="mb-3">
                        <h4>CATEGORY</h4>
                        <?php
                        getcategoriesAsCheckboxes();
                        ?>
                    </div>
                    <!-- Sorting options for Price -->
                    <div class="mb-3">
                        <h4>SORT BY PRICE</h4>
                        <label>
                            <input type="radio" name="sort_price" value="price_asc">
                            Price (Low to High)
                        </label>
                        <label>
                            <input type="radio" name="sort_price" value="price_desc">
                            Price (High to Low)
                        </label>
                    </div>

                    <!-- Sorting options for Name -->
                    <div class="mb-3">
                        <h4>SORT BY NAME</h4>
                        <label>
                            <input type="radio" name="sort_name" value="name_asc">
                            Name (A-Z)
                        </label>
                        <label>
                            <input type="radio" name="sort_name" value="name_desc">
                            Name (Z-A)
                        </label>
                    </div>
                    <!-- Sorting options for Popularity -->
                    <div class="mb-3">
                        <h4>SORT BY POPULARITY</h4>
                        <label>
                            <input type="radio" name="sort_popularity" value="popularity_desc">
                            Popularity (High to Low)
                        </label>
                        <label>
                            <input type="radio" name="sort_popularity" value="popularity_asc">
                            Popularity (Low to High)
                        </label>
                    </div>
                    <!-- Price filter -->
                    <div class="mb-3">
                        <h4>PRICE RANGE</h4>
                        <label for="min_price">Min Price:</label>
                        <input type="text" name="min_price" id="min_price" placeholder="Enter min price" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 0; ?>">

                        <label for="max_price">Max Price:</label>
                        <input type="text" name="max_price" id="max_price" placeholder="Enter max price" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 99999; ?>">

                        <button type="submit" class="btn btn-success mt-4">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--last child-->
    <!--include footer-->
    <?php include('includes/footer.php'); ?>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>