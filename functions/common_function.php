<?php
// including connect file
// include('./includes/connect.php');

// getting product
function getproducts()
{
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products ORDER BY RANDOM() LIMIT 9 OFFSET 0";

            $result_query = pg_query($con, $select_query);

            while ($row = pg_fetch_assoc($result_query)) {
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
          <p class='card-text card-description'>$product_description</p>
          <p class='card-text card-description'>Price:$$product_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div>";
            }
        }
    }
}

function get_all_products()
{
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products ORDER BY RANDOM()";
            $result_query = pg_query($con, $select_query);

            while ($row = pg_fetch_assoc($result_query)) {
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
          <p class='card-text card-description'>$product_description</p>
          <p class='card-text card-description'>Price:$$product_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div>";
            }
        }
    }
}

function get_unique_categories()
{
    global $con;
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM products WHERE category_id='$category_id'";

    $num_of_rows = pg_num_rows(pg_query($con, $select_query));

    if ($num_of_rows == 0) {
        echo "<h1 class='text-center'>No products found in this category</h1>";
    }

    $result_query = pg_query($con, $select_query);

    while ($row = pg_fetch_assoc($result_query)) {
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
          <p class='card-text card-description'>$product_description</p>
          <p class='card-text card-description'>Price:$$product_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Details</a>
        </div>
      </div>

    </div>";
    }
}

function get_unique_brands()
{
    global $con;
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM products WHERE brand_id='$brand_id'";

    $num_of_rows = pg_num_rows(pg_query($con, $select_query));

    if ($num_of_rows == 0) {
        echo "<h1 class='text-center'>No products found for this brand</h1>";
    }

    $result_query = pg_query($con, $select_query);

    while ($row = pg_fetch_assoc($result_query)) {
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
                    <p class='card-text card-description'>$product_description</p>
                    <p class='card-text card-description'>Price:$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Details</a>
                </div>
            </div>
        </div>";
    }
}

// displaying brands in the sidenav
function getbrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = pg_query($con, $select_brands);

    while ($row_data = pg_fetch_assoc($result_brands)) {
        $brand_id = $row_data['brand_id'];
        $brand_title = $row_data['brand_title'];
        echo "<li><a class='nav-link' href='index.php?brand=$brand_id'>$brand_title</a></li>";
    }
}

// displaying categories in the sidenav
function getcategories()
{
    global $con;
    $select_cats = "SELECT * FROM categories";
    $result_cats = pg_query($con, $select_cats);

    while ($row_cats = pg_fetch_assoc($result_cats)) {
        $category_id = $row_cats['category_id'];
        $category_title = $row_cats['category_title'];
        echo "<li><a class='nav-link' href='index.php?category=$category_id'>$category_title</a></li>";
    }
}

// Continue the remaining functions...





// ...

// Search product
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM products WHERE product_keywords ILIKE '%$search_data_value%'";
        $result_query = pg_query($con, $search_query);
        $num_of_rows = pg_num_rows(pg_query($con, $search_query));

        if ($num_of_rows == 0) {
            echo "<h1 class='text-center'>No relevant products found</h1>";
        }

        while ($row = pg_fetch_assoc($result_query)) {
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
                    <p class='card-text card-description'>$product_description</p>
                    <p class='card-text card-description'>Price:$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Details</a>
                </div>
            </div>
        </div>";
        }
    }
}

// View Details
function view_details()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "SELECT * FROM products WHERE product_id=$product_id";
                $result_query = pg_query($con, $select_query);

                while ($row = pg_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keywords = $row['product_keywords'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
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
                            <p class='card-text card-description'>$product_description</p>
                            <p class='card-text card-description'>Price:$$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Details</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                <!--related cards-->
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text_center text-warning mb-5'>Related Images</h4>
                    </div>
                    <div class='col-md-6'>
                        <img class='card-img-top' src='./admin_area/product_images/$product_image2' alt='Card image cap'>
                    </div>
                    <div class='col-md-6'>
                        <img class='card-img-top' src='./admin_area/product_images/$product_image3' alt='Card image cap'>
                    </div>
                </div>
            </div>";
                }
            }
        }
    }
}

// get ip address function
function getIPAddress()
{
    // whether ip is from the share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // whether ip is from the remote address
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// ...

// Cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id='$get_product_id'";
        $result_query = pg_query($con, $select_query);
        $num_of_rows = pg_num_rows(pg_query($con, $select_query));

        if ($num_of_rows > 0) {
            echo "<script>alert('Product already added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id,ip_address) VALUES ('$get_product_id','$ip')";
            $result_query = pg_query($con, $insert_query);

            if ($result_query) {
                echo "<script>alert('Product added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
}

// Function to get cart items number
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip' ";
        $result_query = pg_query($con, $select_query);
        $count_cart_items = pg_num_rows(pg_query($con, $select_query));
    } else {
        global $con;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip' ";
        $result_query = pg_query($con, $select_query);
        $count_cart_items = pg_num_rows(pg_query($con, $select_query));
    }
    echo $count_cart_items;
}

// Total cart price
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;

    $query = "SELECT CAST(SUM(p.product_price * c.quantity) AS NUMERIC(10, 2)) AS total_price
    FROM cart_details c
    JOIN products p ON c.product_id = p.product_id
    WHERE c.ip_address = '$get_ip_add'";


    $result = pg_query($con, $query);

    if ($result) {
        $row = pg_fetch_assoc($result);
        $total_price = $row['total_price'];
    } else {
        // Handle query failure
        echo "Error: " . pg_last_error($con);
    }

    echo $total_price;
}

function total_cart_price0()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add' ";
    $result = pg_query($con, $cart_query);

    while ($row = pg_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products WHERE product_id = '$product_id' ";
        $result_products = pg_query($con, $select_products);

        while ($row_product_price = pg_fetch_assoc($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $values = array_sum($product_price);
            $total_price += $values;
        }
    }
    echo $total_price;
}

// Get user order details
function get_user_order_details0()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE username = '$username'";
    $result_query = pg_query($con, $get_details);
    $row = pg_fetch_assoc($result_query);

    while ($row_query = pg_fetch_assoc($result_query)) {
        $user_id = $row_query['user_id'];

        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_order'])) {
                if (!isset($_GET['delete_account'])) {
                    $sql = "SELECT COUNT(*) AS row_count FROM user_orders WHERE user_id = '$user_id' AND order_status = 'pending'";
                    $result = pg_query($con, $sql);
                    $row = pg_fetch_assoc($result);
                    $row_count = $row['row_count'];

                    if ($row_count > 0) {
                        echo "<h1 class='text-center text-warning'>You have <span class='text-danger'>$row_count</span> pending orders</h1>";
                    }
                }
            }
        }
    }
}

function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT user_id FROM user_table WHERE username = '$username'";
    $result_query = pg_query($con, $get_details);
    $row = pg_fetch_assoc($result_query);

    $user_id = $row['user_id'];

    if (!isset($_GET['edit_account']) && !isset($_GET['my_order']) && !isset($_GET['delete_account'])) {
        $get_pending_orders_count = "SELECT COUNT(*) as pending_order_count FROM user_orders WHERE user_id = '$user_id' AND order_status = 'pending'";
        $result_count = pg_query($con, $get_pending_orders_count);
        $row_count = pg_fetch_assoc($result_count)['pending_order_count'];

        if ($row_count > 0) {
            echo "<h1 class='text-center text-success my-5 mt-5 mb-2'>
            You have <span class='text-danger'>$row_count</span> pending orders</h1>
            <p class = 'text-center'>and <a href='profile.php?my_orders' class='text-center text-danger'>Click here to see your orders</a><p>";
        } else {
            echo "<h1 class='text-center text-success my-5 mt-5 mb-2'>
            You have no pending order</h1>
            <p class = 'text-center'> <a href='index.php' class='text-center text-danger'>Explore our products !</a><p>";
        }
    }
}

// ...
?>
