<h3 class="text-center text-success"> All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <tr>
            <th>Sl No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select = "SELECT * FROM brands";
        $result = mysqli_query($con, $select);
        while($row = mysqli_fetch_assoc($result)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            ?>
            <tr class="text-center">
                <td><?php echo $brand_id; ?></td>
                <td><?php echo $brand_title; ?></td>
                <td><a href="index.php?edit_brand=<?php echo $brand_id ?>" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_brand=<?php echo $brand_id ?>" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        
        <?php
        }
        
        ?>
    </tbody>
</table>
