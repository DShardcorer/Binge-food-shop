<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">

    <!-- CSS file link -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.webp" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="form-outline mb-4">
                    <form action="" method="post">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" 
                        placeholder="Enter your username" class="form-control" required="required">

                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"
                        placeholder="Enter your email" class="form-control" required="required">

                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                        placeholder="Enter your password" class="form-control" required="required">

                        <label for="cf_password" class="form-label">Confirm Password</label>
                        <input type="password" id="cf_password" name="cf_password"
                        placeholder="Confirm your password" class="form-control" required="required">

                        <button type="submit" class="btn btn-warning btn-block mt-4" name="register">
                            Register
                        </button>

                        <p class="small fw-bold mt-2 pt-1">Don't you have an account ? <a href="admin_login.php" class="link-danger">Login </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Select query to check if user already exists
    $check_user = "SELECT * FROM admin_table WHERE admin_email = '$email'";
    $run_check = pg_query($con, $check_user);
    $row_count = pg_num_rows($run_check);

    if($row_count > 0){
        echo "<script>alert('Email already exists')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    }

    if($_POST['password'] != $_POST['cf_password']){
        echo "<script>alert('Password does not match')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert query to insert data into the database
    $insert_admin = "INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$username','$email','$password')";
    $run_admin = pg_query($con, $insert_admin);

    if($run_admin){
        echo "<script>alert('Admin has been registered successfully')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
}
?>
