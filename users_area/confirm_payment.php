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
    $insert_data = "INSERT INTO user_payments (order_id, payment_mode) 
                    VALUES ('$order_id', '$payment_mode')";
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
<meta charset="UTF-8">
    <meta name="description" content="Binge's Food Shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binge's Food Shop</title>
    <link rel="stylesheet" href="style.css">
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--font awersome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline text-center text-light mb-4 w-50 m-auto">
                <label for="invoice_number">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
            </div>
            <div class="form-outline my-5 text-center text-light w-50 m-auto">
                <label for="amount">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>" readonly>
            </div>
            <div class="form-outline my-5 text-center text-light w-50 m-auto">
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
