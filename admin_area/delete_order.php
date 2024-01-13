<?php
if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    $delete_order = "DELETE FROM user_orders WHERE order_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_order); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('Order has been deleted')</script>";
        echo "<script>window.open('list_orders.php','_self')</script>";
    }
}
?>
