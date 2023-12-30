<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <tr>
            <th>Sl No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "SELECT * FROM categories";
        $result_cat = pg_query($con, $select_cat);
        while($row = pg_fetch_assoc($result_cat)){
            $cat_id = $row['category_id'];
            $cat_title = $row['category_title'];
            ?>
            <tr class="text-center">
                <td><?php echo $cat_id; ?></td>
                <td><?php echo $cat_title; ?></td>
                <td><a href="index.php?edit_category=<?php echo $cat_id ?>" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_category=<?php echo $cat_id ?>" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
