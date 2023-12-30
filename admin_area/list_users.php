<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <th>Sl No</th>
        <th>Userame</th>
        <th>Email</th>
        <th>Image</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Delete</th>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php
        $get_users = "SELECT * FROM user_table";
        $result_users = pg_query($con, $get_users);
        $rows_count = pg_num_rows($result_users);

        if ($rows_count == 0) {
            echo "<tr><td colspan='7' class='text-center'><h2>No Users Yet</h2></td></tr>";
        } else {
            $i = 0;
            while ($row = pg_fetch_assoc($result_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_address = $row['user_address'];
                $user_mobile = $row['user_mobile'];
                $i++;
                echo "<tr class='text-center'>
                    <td>$i</td>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td><img src='../users_area/user_images/$user_image' width='50' height='50'></td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='index.php?delete_user=$user_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>
