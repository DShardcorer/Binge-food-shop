<?php
if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];
    $delete_category = "DELETE FROM categories WHERE category_id = '$delete_id'";
    $run_delete = pg_query($con, $delete_category); // Assuming $con is the PostgreSQL connection variable
    if($run_delete){
        echo "<script>alert('Category has been deleted')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>
