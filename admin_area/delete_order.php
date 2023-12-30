<?php
if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    $delete_order = "DELETE FROM orders WHERE order_id = '$delete_id'";
    $run_delete = mysqli_query($con,$delete_order);
    if($run_delete){
        echo "<script>alert('Order has been deleted')</script>";
        echo "<script>window.open('index.php?list_orders','_self')</script>";
    }
}

?>