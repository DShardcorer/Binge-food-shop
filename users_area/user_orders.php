<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $username = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE username = '$username'";
    $result_query = pg_query($con, $select_query);
    $row_fetch = pg_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];

    ?>
    <h3 class="text-success">
        Order History
    </h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-warning">
            <tr>
                <th>SI no</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Completed/Incompleted</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_order_details = "SELECT * FROM user_orders WHERE user_id = $user_id";
            $result_order_details = pg_query($con, $get_order_details);
            $number = 1;
            while ($row_order_details = pg_fetch_assoc($result_order_details)) {
                $order_id = $row_order_details['order_id'];
                $amount_due = $row_order_details['amount_due'];
                $total_products = $row_order_details['total_products'];
                $order_invoice = $row_order_details['invoice_number'];
                $order_date = $row_order_details['order_date'];
                $order_status = $row_order_details['order_status'];

                echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$order_invoice</td>
                        <td>$order_date</td>";

                if ($order_status == 'Completed') {
                    echo "<td>Paid</td>";
                } else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-center'>Confirm</a></td>";
                }

                echo "</tr>";
                $number++;
                
            }
            ?>
        </tbody>
    </table>
</body>

</html>
