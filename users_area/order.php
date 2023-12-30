<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

// Getting the user's IP address
$get_ip_add = getIPAddress();

// Initialize variables
$invoice_number = mt_rand();
$status = "pending";
$order_date = date("Y-m-d H:i:s");

// Initialize arrays to store product information for order_info table
$order_info_values = array();

// Getting total item and total price
$total_price = 0;
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
$result_cart_price = pg_query($con, $cart_query_price);

// Loop through cart items
while($row_price = pg_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity'];

    // Get product details
    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
    $run_price = pg_query($con, $select_product);

    while($row_product_price = pg_fetch_array($run_price)){
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price * $quantity;

        // Store values for order_info table
        $order_info_values[] = "($user_id, $product_id, $quantity)";
    }
}

// Insert into user_orders table
$insert_order = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, " . count($order_info_values) . ", '$order_date', '$status')";
$result_query = pg_query($con, $insert_order);

if($result_query){
    // Get the last inserted order_id
    $last_order_id = pg_last_oid($result_query);



    // Insert into order_info table with the original order_id
    if (!empty($order_info_values)) {
        $order_info_values_str = implode(", ", $order_info_values);
        $insert_order_info = "INSERT INTO order_info (order_id, product_id, quantity) VALUES $order_info_values_str";
        $result_order_info = pg_query($con, $insert_order_info);
    }

    // Delete items from cart
    $empty_cart = "DELETE FROM cart_details WHERE ip_address = '$get_ip_add'";
    $result_delete = pg_query($con, $empty_cart);

    echo "<script>alert('Order has been placed successfully')</script>";
    header("Location: profile.php");
exit;

}
?>
