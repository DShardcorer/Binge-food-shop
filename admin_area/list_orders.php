<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <th>Sl No</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php
        $get_order = "SELECT * FROM user_orders";
        $result_order = pg_query($con, $get_order);
        $rows_count = pg_num_rows($result_order);

        if ($rows_count == 0) {
            echo "<tr><td colspan='7' class='text-center'><h2>No Orders Yet</h2></td></tr>";
        } else {
            $i = 0;
            while ($row = pg_fetch_assoc($result_order)) {
                $order_id = $row['order_id'];
                $amount_due = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];
                $i++;
                echo "<tr class='text-center'>
                    <td>$i</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href='index.php?delete_order=$order_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>
