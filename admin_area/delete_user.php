<?php
if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];
    $delete_user = "DELETE FROM user_table WHERE user_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_user); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('User has been deleted')</script>";
        echo "<script>window.open('index.php?list_users','_self')</script>";
    }
}
?>
