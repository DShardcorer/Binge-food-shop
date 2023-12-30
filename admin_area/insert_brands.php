<?php
include('../includes/connect.php');

if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];

    // Select data from the database
    $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_select = pg_query($con, $select_query);
    $number_of_rows = pg_num_rows($result_select);

    if($number_of_rows > 0){
        echo "<script>alert('Brand already exists')</script>";
        echo "<script>window.open('index.php?insert_brands','_self')</script>";
    } else {
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = pg_query($con, $insert_query);

        if($result){
            echo "<script>alert('Brand inserted successfully')</script>";
            echo "<script>window.open('index.php?insert_brands','_self')</script>";
        } else {
            echo "<script>alert('Brand not inserted successfully')</script>";
            echo "<script>window.open('index.php?insert_brands','_self')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert New Brands</h2>
<form action="" method="post" style="padding:80px;" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-warning" name="insert_brand" value="Insert Brand" 
  aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>
