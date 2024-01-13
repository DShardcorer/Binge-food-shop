<?php
include('../includes/connect.php');


$username_session = $_SESSION['username'];

if (isset($_POST['delete'])) {
    $delete_user = "DELETE FROM user_table WHERE username = '$username_session'";
    $result_delete = pg_query($con, $delete_user);

    if ($result_delete) {
        session_destroy();
        echo "<script>alert('Your Account has been deleted!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>
</body>
</html>
