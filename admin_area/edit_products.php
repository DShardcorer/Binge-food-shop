<?php

if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM products WHERE product_id = $edit_id";
    $result = pg_query($con, $get_data);
    $row = pg_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $product_category = $row['category_id'];
    $product_brand = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    //fetch category name
    $get_category = "SELECT * FROM categories WHERE category_id = $product_category";
    $result_category = pg_query($con, $get_category);
    $row_category = pg_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    $category_id = $row_category['category_id'];

    //fetch brand name
    $get_brand = "SELECT * FROM brands WHERE brand_id = $product_brand";
    $result_brand = pg_query($con, $get_brand);
    $row_brand = pg_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
    $brand_id = $row_brand['brand_id'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required"
                value="<?php echo $product_title ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_description" class="form-control" required="required"
                value="<?php echo $product_description ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required"
                value="<?php echo $product_keywords ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" id="product_category">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                $get_category_all = "SELECT * FROM categories";
                $result_category_all = pg_query($con, $get_category_all);

                while ($row_category_all = pg_fetch_assoc($result_category_all)) {
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" id="product_brands">
                <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                <?php
                $get_brand_all = "SELECT * FROM brands";
                $result_brand_all = pg_query($con, $get_brand_all);

                while ($row_brand_all = pg_fetch_assoc($result_brand_all)) {
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                };
                ?>
            </select>

        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required"
                value="<?php echo $product_price ?>">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-warning px-3 mb-3">
        </div>

        <?php
        if (isset($_POST['edit_product'])) {
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $product_keywords = $_POST['product_keywords'];
            $product_category = $_POST['product_category'];
            $product_brand = $_POST['product_brands'];
            $product_image1 = $_FILES['product_image1']['name'];
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image3 = $_FILES['product_image3']['name'];

            $temp_image1 = $_FILES['product_image1']['tmp_name'];
            $temp_image2 = $_FILES['product_image2']['tmp_name'];
            $temp_image3 = $_FILES['product_image3']['tmp_name'];

            $product_price = $_POST['product_price'];

            if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_category) || empty($product_brand) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
                echo "<script>alert('Please fill all the fields!')</script>";
            } else {
                move_uploaded_file($temp_image1, "./product_images/$product_image1");
                move_uploaded_file($temp_image2, "./product_images/$product_image2");
                move_uploaded_file($temp_image3, "./product_images/$product_image3");

                $query_update_product = "UPDATE products SET product_title = '$product_title', 
                    product_description = '$product_description', product_keywords = '$product_keywords', 
                    category_id = '$product_category', brand_id = '$product_brand', product_image1 = '$product_image1', 
                    product_image2 = '$product_image2', product_image3 = '$product_image3', product_price = '$product_price' 
                    WHERE product_id = $edit_id";
                $result_update_product = pg_query($con, $query_update_product);
                if ($result_update_product) {
                    echo "<script>alert('Product updated successfully!')</script>";
                    echo "<script>window.open('index.php?view_products','_self')</script>";
                }
            }
        }
        ?>
    </form>
</div>
