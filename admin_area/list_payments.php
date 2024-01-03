<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <th>Sl No</th>
        <th>Amount</th>
        <th>Invoice Number</th>
        <th>Payment Method</th>
        <th>Order Date</th>
        <th>Delete</th>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php
        $get_payments = "SELECT * FROM user_payments JOIN user_order ON user_payments.order_id = user_order.order_id";
        $result_payments = pg_query($con, $get_payments);
        $rows_count = pg_num_rows($result_payments);

        if ($rows_count == 0) {
            echo "<tr><td colspan='6' class='text-center'><h2>No Payments Yet</h2></td></tr>";
        } else {
            $i = 0;
            while ($row = pg_fetch_assoc($result_payments)) {
                $payment_id = $row['payment_id'];
                $amount = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $payment_mode = $row['payment_mode'];
                $date = $row['date'];
                $i++;
                echo "<tr class='text-center'>
                    <td>$i</td>
                    <td>$amount</td>
                    <td>$invoice_number</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
                    <td><a href='index.php?delete_payment=$payment_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>
