<?php
if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];
    $delete_payment = "DELETE FROM payments WHERE payment_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_payment); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('Payment has been deleted')</script>";
        echo "<script>window.open('index.php?list_payments','_self')</script>";
    }
}
?>
