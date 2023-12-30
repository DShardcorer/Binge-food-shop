<?php


if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    // Select data from the database
    $select_query = "SELECT * FROM categories WHERE category_title = '$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number_of_rows = mysqli_num_rows($result_select);

    if($number_of_rows > 0){
        echo "<script>alert('Category already exists')</script>";
        echo "<script>window.open('index.php?insert_categories','_self')</script>";
    } else {
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('Category inserted successfully')</script>";
            echo "<script>window.open('index.php?insert_categories','_self')</script>";
        } else {
            echo "<script>alert('Category not inserted successfully')</script>";
            echo "<script>window.open('index.php?insert_categories','_self')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert New Category</h2>
<form action="" method="post" style="padding:80px;" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        </div>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="categories"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-warning" name="insert_cat" value="Insert Category" 
  aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>
