<?php
if(isset($_GET['edit_brand'])){
    $brand_id = $_GET['edit_brand'];
    $get_brand = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
    $run_brand = mysqli_query($con,$get_brand);
    $row_brand = mysqli_fetch_array($run_brand);
    $brand_id = $row_brand['brand_id'];
    $brand_title = $row_brand['brand_title'];
}

if(isset($_POST['update_brand'])){
    $brand_title = $_POST['brand_title'];
    $update_brand = "UPDATE brands SET brand_title = '$brand_title' WHERE brand_id = '$brand_id'";
    $run_update = mysqli_query($con,$update_brand);
    if($run_update){
        echo "<script>alert('Brand has been updated')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>

<h2 class="text-center">Edit Brand</h2>
<form action="" method="post" style="padding:80px;" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="brands"
            aria-describedby="basic-addon1" value="<?php echo $brand_title ?>">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-warning" name="update_brand" value="Update Brand" 
  aria-label="Username" aria-describedby="basic-addon1">
    </div>