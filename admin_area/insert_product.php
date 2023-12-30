<?php

include("../includes/connect.php");
if (isset($_POST['insert_product'])) {
    $product_title = pg_escape_string($con, $_POST['product_title']);
    $product_description = pg_escape_string($con, $_POST['product_description']);
    $product_keywords = pg_escape_string($con, $_POST['product_keywords']);
    $product_categories = pg_escape_string($con, $_POST['product_categories']);
    $product_brands = pg_escape_string($con, $_POST['product_brands']);

    // Access image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing image tmp name
    $temp_name1 = $_FILES['product_image1']['tmp_name'];
    $temp_name2 = $_FILES['product_image2']['tmp_name'];
    $temp_name3 = $_FILES['product_image3']['tmp_name'];

    $product_price = pg_escape_string($con, $_POST['product_price']);
    $product_status = 'true';

    // Empty check
    if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_categories) || empty($product_brands) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
        echo "<script>alert('Please fill all the fields!')</script>";
    } else {
        // Check for file upload success
        if (
            move_uploaded_file($temp_name1, "product_images/$product_image1") &&
            move_uploaded_file($temp_name2, "product_images/$product_image2") &&
            move_uploaded_file($temp_name3, "product_images/$product_image3")
        ) {
            // Insert query
            $insert_query = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
            VALUES ('$product_title','$product_description','$product_keywords','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(), '$product_status')";

            $result_query = pg_query($con, $insert_query);

            if ($result_query) {
                echo "<script>alert('Product inserted successfully!')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
            } else {
                echo "<script>alert('Product not inserted successfully!')</script>";
                echo "<script>window.open('index.php?insert_products','_self')</script>";
            }
        } else {
            echo "<script>alert('File upload failed!')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content remains the same -->
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">
            Insert Products
        </h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data" class="">
            <!-- ... other form fields ... -->
            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" id="insert_product" class="btn btn-warning form-control"
                    value="Insert Product">
            </div>
        </form>
    </div>
</body>

</html>
