<?php
include('../includes/connect.php');

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatiable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insert Products - Admin Dashboard</title>
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

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">
            Insert Products
        </h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data" class="">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea name="product_description" id="product_description" class="form-control"
                    placeholder="Enter Product Description" autocomplete="off" required="required"></textarea>
            </div>
            <!-- ... other form fields ... -->
            <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                    placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>
            <!--Categories  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="product_categories" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "SELECT * FROM categories";
                    $result_query = pg_query($con, $select_query);
                    while ($row = pg_fetch_assoc($result_query)) {
                        $category_id = $row['category_id'];
                        $category_title = $row['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!--Brands  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="product_brands" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = pg_query($con, $select_query);
                    while ($row = pg_fetch_assoc($result_query)) {
                        $brand_id = $row['brand_id'];
                        $brand_title = $row['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!--image-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
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
        </form>

    </div>

</body>

</html>
