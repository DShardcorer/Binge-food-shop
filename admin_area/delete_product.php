<?php
if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];
    $delete_product = "DELETE FROM products WHERE product_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_product); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('Product has been deleted')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
?>
