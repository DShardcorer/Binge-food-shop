<?php
if(isset($_GET['edit_category'])){
    $category_id = $_GET['edit_category'];
    $get_cat = "SELECT * FROM categories WHERE category_id = '$category_id'";
    $run_cat = pg_query($con, $get_cat); // Assuming $con is the PostgreSQL connection variable
    $row_cat = pg_fetch_assoc($run_cat);
    $category_id = $row_cat['category_id'];
    $category_title = $row_cat['category_title'];
}

if(isset($_POST['update_cat'])){
    $category_title = $_POST['category_title'];
    $update_cat = "UPDATE categories SET category_title = '$category_title' WHERE category_id = '$category_id'";
    $run_cat = pg_query($con, $update_cat); // Assuming $con is the PostgreSQL connection variable
    if($run_cat){
        echo "<script>alert('Category has been updated')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}
?>

<h2 class="text-center">Edit Category</h2>
<form action="" method="post" style="padding:80px;" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="category_title" placeholder="Insert Category" aria-label="categories"
            aria-describedby="basic-addon1" value="<?php echo $category_title ?>">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-warning" name="update_cat" value="Update Category" 
  aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>
