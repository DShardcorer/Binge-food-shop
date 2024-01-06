<?php
@session_start();
include('../includes/connect.php');
include('../functions/common_function.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect or handle unauthorized access
    echo "<script>alert('Please log in to place an order')</script>";
    header("Location: user_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="style.css">
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--font awersome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
    <style>
        img{
            width: 90%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <!--php code to access user id-->
    <?php
    $username = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE username = '$username'";
    $result_query = pg_query($con, $select_query);
    $row_fetch = pg_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    ?>



    <div class="container">
        <h2 class="text-center text-warning"> Payment Options </h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col md-6">
            <a href="https://www.paypal.com/vn/home" class="" target="_blank">
                <img src="../images/upi.jpg" alt="" class="">
                <h2 class="text-center">Placeholder Immediate Online Payment</h2>
            </a>
            </div>
            <div class="col md-6">
            <a href="order.php?user_id=<?php echo $user_id?>" class="text-center" target="_self">
                <h2 class="">Pay upon receiving package</h2>
            </a>
            </div>
            
        </div>
    </div>
</body>
</html>
