<!DOCTYPE html>
<html lang="en">
<style>
    .admin_image {
        width: 100px;
        object-fit: contain;
    }

    .btn-custom {
        padding: 10px 20px;
        /* Adjust the padding as needed */
        margin: 5px;
        /* Adjust the margin as needed */
        font-size: 16px;
        /* Adjust the font size as needed */
        border-radius: 5px;
        /* Add rounded corners if desired */
        text-transform: uppercase;
        font-weight: bold;
    }
</style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatiable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--font awersome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">

    <!--css file link-->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!--navbar start-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item"></li>
                        <a href="" class="nav-link">Welcome !</a>
                    </ul>
            </div>
        </nav>
    </div>

    <!--second child-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Content</h3>
    </div>


    <!--third child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-2">
                <a href="" class="">
                    <img src="..\images\Edy-s-Dreyer-s-Grand-Chocolate-Ice-Cream-48oz_28d26476-0306-4c00-a45e-e3a4b03a6c9c.017601e177974592eefc35d698a9c8ee.webp"
                        alt="" class="admin_image">
                    <p class="text-light text-center">Admin name</p>
                </a>
            </div>
            <div class="button text-center">
                <button class="my-3 btn-custom"><a href="insert_product.php" class="text-center nav-link text-dark bg-warning my-1">Insert
                        Products</a></button>
                <!-- Add the 'btn-custom' class to all buttons -->
                <button class="btn-custom"><a href="" class="text-center nav-link text-dark bg-warning my-1">View
                        Products</a></button>
                <button class="btn-custom"><a href="index.php?insert_categories" class="text-center nav-link text-dark bg-warning my-1">Insert
                        Categories</a></button>
                <button class="btn-custom"><a href="" class="text-center nav-link text-dark bg-warning my-1">View
                        Categories</a></button>
                <button class="btn-custom"><a href="index.php?insert_brands" class="text-center nav-link text-dark bg-warning my-1">Insert
                        Brands</a></button>
                <button class="btn-custom"><a href="" class="text-center nav-link text-dark bg-warning my-1">View
                        Brands</a></button>
                <button class="btn-custom"><a href=""
                        class="text-center nav-link text-dark bg-warning my-1">Orders</a></button>
                <button class="btn-custom"><a href=""
                        class="text-center nav-link text-dark bg-warning my-1">Payments</a></button>
                <button class="btn-custom"><a href=""
                        class="text-center nav-link text-dark bg-warning my-1">Users</a></button>
                <button class="btn-custom"><a href=""
                        class="text-center nav-link text-dark bg-warning my-1">Logout</a></button>
            </div>
        </div>
    </div>

    <!--fourth child-->

    <div class="container my-5">
        <?php
        if(isset($_GET["insert_categories"])){
            include("insert_categories.php");}
        if(isset($_GET["insert_brands"])){
            include("insert_brands.php");}
        ?>
    </div>
    <!--last child-->
    <div class="container my-5">
        <footer class="bg-warning">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                        <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">About Us</h5>
                        <p>
                            This is just an experimental E-commerce website built as the graduation research project of
                            a humble
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>