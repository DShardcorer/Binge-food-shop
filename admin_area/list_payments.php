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
                <button class="btn-custom"><a href="list_orders.php" class="text-center nav-link text-dark bg-warning my-1">Orders</a></button>
                <button class="btn-custom"><a href="list_payments.php" class="text-center nav-link text-dark bg-warning my-1">Payments</a></button>
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

        <!-- Add a filter form above the table -->
        <form method="get" action="list_payments.php">
            <div class="mb-3">
                <label for="payment_method">Payment Method:</label>
                <select name="payment_method" id="payment_method">
                    <option value="">All</option>
                    <option value="UPI">UPI</option>
                    <option value="Banking">Banking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay Offline">Pay Offline</option>
                    <!-- Add more payment methods if needed -->
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date">From:</label>
                <input type="date" name="start_date" id="start_date">

                <label for="end_date">To:</label>
                <input type="date" name="end_date" id="end_date">
            </div>

            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>


        <h3 class="text-center text-success">All Payments</h3>
        <table class="table table-bordered mt-5">
            <thead class="bg-warning">
                <th>Sl No</th>
                <th>Amount</th>
                <th>Invoice Number</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
                <th>Delete</th>
            </thead>
            <tbody class='bg-secondary text-light'>
                <?php
                $get_payments = "SELECT * FROM user_payments JOIN user_orders ON user_payments.order_id = user_orders.order_id";

                // Filter by payment method
                if (isset($_GET['payment_method']) && !empty($_GET['payment_method'])) {
                    $payment_method_filter = pg_escape_string($con, $_GET['payment_method']);
                    $get_payments .= " WHERE payment_mode = '$payment_method_filter'";
                }

                // Filter by date range
                if (
                    isset($_GET['start_date']) && isset($_GET['end_date']) &&
                    !empty($_GET['start_date']) && !empty($_GET['end_date'])
                ) {
                    $start_date = pg_escape_string($con, $_GET['start_date']);
                    $end_date = pg_escape_string($con, $_GET['end_date']);

                    // Assuming your date column in the database is named 'date'
                    $get_payments .= " AND date BETWEEN '$start_date' AND '$end_date'";
                }
                $result_payments = pg_query($con, $get_payments);
                $rows_count = pg_num_rows($result_payments);

                if ($rows_count == 0) {
                    echo "<tr><td colspan='6' class='text-center'><h2>No Payments Yet</h2></td></tr>";
                } else {
                    $i = 0;
                    while ($row = pg_fetch_assoc($result_payments)) {
                        $payment_id = $row['payment_id'];
                        $amount = $row['amount_due'];
                        $invoice_number = $row['invoice_number'];
                        $payment_mode = $row['payment_mode'];
                        $date = $row['date'];
                        $i++;
                        echo "<tr class='text-center'>
                    <td>$i</td>
                    <td>$amount</td>
                    <td>$invoice_number</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
                    <td><a href='index.php?delete_payment=$payment_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                    }
                }

                ?>
            </tbody>
        </table>
        <?php

        if (
            isset($_GET['start_date']) && isset($_GET['end_date']) &&
            !empty($_GET['start_date']) && !empty($_GET['end_date'])
        ) {
            $start_date = pg_escape_string($con, $_GET['start_date']);
            $end_date = pg_escape_string($con, $_GET['end_date']);
            $payment_mode_filter = pg_escape_string($con, $_GET['payment_method']);

            $get_total_sales_query = "SELECT get_total_sales('$start_date', '$end_date', '$payment_mode_filter') AS total_sales";
            $result_total_sales = pg_query($con, $get_total_sales_query);
            $row_total_sales = pg_fetch_assoc($result_total_sales);
            $total_sales = $row_total_sales['total_sales'];

            echo "<h4 class='text-center mt-3'>Total Sales: $" . $total_sales . "</h4>";
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