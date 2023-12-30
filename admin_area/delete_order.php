<?php
if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    $delete_order = "DELETE FROM orders WHERE order_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_order); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('Order has been deleted')</script>";
        echo "<script>window.open('index.php?list_orders','_self')</script>";
    }
}
?>
