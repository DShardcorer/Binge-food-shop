<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_orders WHERE order_id = '$order_id'";
    $result_data = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result_data);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];

}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $complete = 'Completed';
    $insert_data = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode) 
    VALUES ('$order_id', '$invoice_number', '$amount', '$payment_mode')";  
    $result = mysqli_query($con, $insert_data);
    if($result){
        echo "<script>alert('Payment Successfull !')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
    $update_order = "UPDATE user_orders SET order_status = '$complete' WHERE order_id = '$order_id'";
    $result_update = mysqli_query($con, $update_order);

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
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
        <div class="form-outline my-5 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
        </div>
        <div class="form-outline my-5 text-center w-50 m-auto">
            <label for="amount">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $invoice_number ?>">
        </div>
        <div class="form-outline my-5 text-center w-50 m-auto">
            <select name="payment_mode" id="" class="form-select w-50 m-auto">
            <option value="">Select Payment Method</option>
                <option value="">UPI</option>
                <option value="">Banking</option>
                <option value="">Paypal</option>
                
                
                <option value="">Cash on Delivery</option>
                <option value="">Pay Offline</option>
            </select>
        </div>
        <div class="form-outline my-5 text-center w-50 m-auto">
            <input type="submit" class="bg-warning py-2 px-3 border-0" value="Confirm" name="confirm_payment">
        </div>
        </form>
    </div>
    
</body>
</html>