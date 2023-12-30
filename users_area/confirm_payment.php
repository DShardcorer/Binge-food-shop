<?php
include('../includes/connect.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_orders WHERE order_id = '$order_id'";
    $result_data = pg_query($con, $select_data);
    $row_fetch = pg_fetch_assoc($result_data);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $complete = 'Completed';

    // Insert payment data into user_payments table
    $insert_data = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode) 
                    VALUES ('$order_id', '$invoice_number', '$amount', '$payment_mode')";
    $result = pg_query($con, $insert_data);

    // Update order status to Completed
    $update_order = "UPDATE user_orders SET order_status = '$complete' WHERE order_id = '$order_id'";
    $result_update = pg_query($con, $update_order);

    if ($result && $result_update) {
        echo "<script>alert('Payment Successful!')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    } else {
        echo "<script>alert('Payment failed. Please try again.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags and stylesheet links here -->
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-5 text-center w-50 m-auto">
                <label for="invoice_number">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
            </div>
            <div class="form-outline my-5 text-center w-50 m-auto">
                <label for="amount">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>" readonly>
            </div>
            <div class="form-outline my-5 text-center w-50 m-auto">
                <label for="payment_mode">Select Payment Method</label>
                <select name="payment_mode" class="form-select w-50 m-auto" required>
                    <option value="">Select Payment Method</option>
                    <option value="UPI">UPI</option>
                    <option value="Banking">Banking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay Offline">Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-5 text-center w-50 m-auto">
                <input type="submit" class="bg-warning py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
