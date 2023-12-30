<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
if (!isset($_SESSION['admin_name'])) {
    echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<style>
    .admin_image {
        width: 100px;
        object-fit: contain;
    }

    .btn-custom {
        padding: 10px 20px;
        margin: 5px;
        font-size: 16px;
        border-radius: 5px;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <img src="..\images\Edy-s-Dreyer-s-Grand-Chocolate-Ice-Cream-48oz_28d26476-0306-4c00-a45e-e3a4b03a6c9c.017601e177974592eefc35d698a9c8ee.webp" alt="" class="admin_image">
                    <p class="text-light text-center"><?php echo $_SESSION['admin_name']; ?></p>
                </a>
            </div>
            <div class="button text-center">
                <button class="my-3 btn-custom"><a href="insert_product.php" class="text-center nav-link text-dark bg-warning my-1">Insert Products</a></button>
                <button class="btn-custom"><a href="index.php?view_products" class="text-center nav-link text-dark bg-warning my-1">View Products</a></button>
                <button class="btn-custom"><a href="index.php?insert_categories" class="text-center nav-link text-dark bg-warning my-1">Insert Categories</a></button>
                <button class="btn-custom"><a href="index.php?view_categories" class="text-center nav-link text-dark bg-warning my-1">View Categories</a></button>
                <button class="btn-custom"><a href="index.php?insert_brands" class="text-center nav-link text-dark bg-warning my-1">Insert Brands</a></button>
                <button class="btn-custom"><a href="index.php?view_brands" class="text-center nav-link text-dark bg-warning my-1">View Brands</a></button>
                <button class="btn-custom"><a href="index.php?list_orders" class="text-center nav-link text-dark bg-warning my-1">Orders</a></button>
                <button class="btn-custom"><a href="index.php?list_payments" class="text-center nav-link text-dark bg-warning my-1">Payments</a></button>
                <button class="btn-custom"><a href="index.php?list_users" class="text-center nav-link text-dark bg-warning my-1">Users</a></button>
                <button class="btn-custom"><a href="admin_logout.php" class="text-center nav-link text-dark bg-warning my-1">Logout</a></button>
            </div>
        </div>
    </div>

    <!--fourth child-->
    <div class="container my-5">
        <?php
        if (isset($_GET["insert_categories"])) {
            include("insert_categories.php");
        }
        if (isset($_GET["insert_brands"])) {
            include("insert_brands.php");
        }
        if (isset($_GET["view_products"])) {
            include("view_products.php");
        }
        if (isset($_GET["edit_products"])) {
            include("edit_products.php");
        }
        if (isset($_GET["delete_product"])) {
            include("delete_product.php");
        }
        if (isset($_GET["view_categories"])) {
            include("view_categories.php");
        }
        if (isset($_GET["view_brands"])) {
            include("view_brands.php");
        }
        if (isset($_GET["edit_category"])) {
            include("edit_category.php");
        }
        if (isset($_GET["delete_category"])) {
            include("delete_category.php");
        }
        if (isset($_GET["edit_brand"])) {
            include("edit_brand.php");
        }
        if (isset($_GET["delete_brand"])) {
            include("delete_brand.php");
        }
        if (isset($_GET["list_orders"])) {
            include("list_orders.php");
        }
        if (isset($_GET["delete_order"])) {
            include("delete_order.php");
        }
        if (isset($_GET["list_payments"])) {
            include("list_payments.php");
        }
        if (isset($_GET["delete_payment"])) {
            include("delete_payment.php");
        }
        if (isset($_GET["list_users"])) {
            include("list_users.php");
        }
        if (isset($_GET["delete_user"])) {
            include("delete_user.php");
        }
        ?>
    </div>

    <!--last child-->
    <!--include footer-->
    <?php include('../includes/footer.php'); ?>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
