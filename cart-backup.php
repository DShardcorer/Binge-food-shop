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
    <title>Binge's Food Shop - Your Cart </title>
    <link rel="stylesheet" href="style.css">
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--font awersome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .cart_image {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .limited_width {
            max-width: 50px;
            /* Adjust the value as needed */
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
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>


                    </ul>
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


    <!--fourth child-table-->
    <!--php code to display data-->
    <?php

    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="w-50">Product Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add' ";
                        $result = mysqli_query($con, $cart_query);
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * FROM products WHERE product_id = '$product_id' ";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $values = array_sum($product_price);
                                $total_price += $values;

                        ?>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_image"></td>
                                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>


                                    <?php
                                    $get_ip_add = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantities = (int)$_POST['qty'];
                                        $update_cart = "UPDATE cart_details SET quantity = '$quantities' WHERE ip_address = '$get_ip_add' ";
                                        $result_product_quantity = mysqli_query($con, $update_cart);
                                        $total_price = $total_price * $quantities;
                                    }
                                    ?>


                                    <td>$<?php echo $price_table ?></td>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <!--<button class="bg-warning px-3 mx-3">Update</button>-->
                                        <input type="submit" class="bg-warning px-3 mx-3" value="Update Cart" name="update_cart">
                                        <button class="bg-secondary px-3">Remove</button>
                                    </td>
                                </tr>

                        <?php }
                        } ?>
                    </tbody>
                </table>
                <!--subtotal-->
                <div class="d-flex">
                    <h4 class="px-3">Subtotal: <strong class="text-info">$<?php echo $total_price ?></strong></h4>
                    <a href="index.php" class="btn bg-warning px-3 mx-3">Continue Shopping</a>
                    <a href="index.php" class="btn bg-secondary px-3">Checkout</a>
                </div>
        </div>
    </div>
    </form>





    <!--include footer-->
    <?php include('includes/footer.php');
    ?>


    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>