<?php
// Logout
session_start();
session_unset();
session_destroy();

// Jump to the login page
echo "<script>window.open('admin_login.php','_self')</script>";
?>
