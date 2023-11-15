<?php
//including connect file
include('./includes/connect.php');



//getting product
function getproducts()
{
    global $con;



    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {




            $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_array($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/$product_image1'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> $product_title</h5>
          <p class='card-text card-description'>$product_description
            content.</p>
          <a href='#' class='btn btn-warning'>Add to cart</a>
          <a href='#' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div>";

            }
            ;
        }
    }
}

function get_unique_categories()
{
    global $con;
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM products WHERE category_id='$category_id'";

    $num_of_rows = mysqli_num_rows(mysqli_query($con, $select_query));
    if($num_of_rows==0){
        echo "<h1 class='text-center'>No products found in this category</h1>";
    }
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_array($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class=' col-md-4 mb-2'>
      <div class='card'>
        <img class='card-img-top'
          src='./admin_area/product_images/$product_image1'
          alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'> $product_title</h5>
          <p class='card-text card-description'>$product_description
            content.</p>
          <a href='#' class='btn btn-warning'>Add to cart</a>
          <a href='#' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div>";

    }
    ;
}

function get_unique_brands()
{
    global $con;
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM products WHERE brand_id='$brand_id'";

    $num_of_rows = mysqli_num_rows(mysqli_query($con, $select_query));
    if($num_of_rows==0){
        echo "<h1 class='text-center'>No products found for this brand</h1>";
    }
    
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_array($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "<div class=' col-md-4 mb-2'>
            <div class='card'>
                <img class='card-img-top'
                    src='./admin_area/product_images/$product_image1'
                    alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                    <p class='card-text card-description'>$product_description content.</p>
                    <a href='#' class='btn btn-warning'>Add to cart</a>
                    <a href='#' class='btn btn-dark'>View Details</a>
                </div>
            </div>
        </div>";
    }
}






//displaying brands in the sidenav
function getbrands()
{

    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_array($result_brands)) {
        $brand_id = $row_data['brand_id'];
        $brand_title = $row_data['brand_title'];
        echo "<li class='nav-item'>
      <a href='index.php?brand=$brand_id' class='nav-link active text-center text-dark custom-text'>$brand_title</a>
    </li>";
    }
}

function getcategories()
{
    global $con;
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);

    while ($row_data = mysqli_fetch_array($result_categories)) {
        $category_id = $row_data['category_id'];
        $category_title = $row_data['category_title'];

        echo "<li class='nav-item'>
            <a href='index.php?category=$category_id' class='nav-link active text-center text-dark custom-text'>$category_title</a>
          </li>";
    }
}


?>