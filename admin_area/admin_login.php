<?php
session_start();
include("../includes/connect.php");
include("../functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">

    <!--css file link-->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Login
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.webp" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="form-outline mb-4">
                    <form action="" method="post">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username"
                            class="form-control" required="required">

                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="form-control" required="required">

                        <button type="submit" class="btn btn-warning btn-block mt-4" name="login">
                            Login
                        </button>

                        <p class="small fw-bold mt-2 pt-1">Don't have an account ? <a
                                href="admin_registration.php" class="link-danger">Register </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
//session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_table WHERE admin_name='$username'";
    $result = pg_query($con, $query);
    $row = pg_fetch_assoc($result);
    $enc_password = $row['admin_password'];
    $count = pg_num_rows($result);

    if ($count == 1 && crypt($password, $enc_password) == $enc_password) {
        $_SESSION['admin_name'] = $row['admin_name'];
        $_SESSION['admin_id'] = $row['admin_id'];

        //echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        echo "<script>alert('Username or Password is incorrect')</script>";
    }
}
?>
