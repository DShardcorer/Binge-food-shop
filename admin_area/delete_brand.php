<?php
if(isset($_GET['delete_brand'])){
    $delete_id = $_GET['delete_brand'];
    $delete_brand = "DELETE FROM brands WHERE brand_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_brand); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('Brand has been deleted')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>
