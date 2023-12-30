<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <th>Product ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products = "SELECT * FROM products";
        $result_products = mysqli_query($con, $get_products);
        $number=0;
        while($row = mysqli_fetch_assoc($result_products)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_status = $row['status'];
            $number++;
            $amount_sold = $row['amount_sold'];
            ?>
            <tr class='text-center'>
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image1; ?>' width='60' height='60'></td>
                <td><?php echo $product_price; ?></td>
                <td><?php echo $amount_sold; ?><</td>
                <td><?php echo $product_status; ?></td>
                <td><a href="index.php?edit_products=<?php echo $product_id ?>" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_product=<?php echo $product_id ?>" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>