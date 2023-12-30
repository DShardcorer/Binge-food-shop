<?php
//logout
session_start();
session_unset();
session_destroy();
//jump to login page
echo "<script>window.open('admin_login.php','_self')</script>";

?>