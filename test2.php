<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>This is test2.php</h2>
    <?php
    $connection = pg_connect("host=localhost port=5432 dbname=sales_db2 user=postgres password=admin");
    if($connection){
        echo "connected";
    }
    else{
        echo "not connected";
    }
    $result = pg_query($connection,"select * from customer");
    if($result){
        echo "query executed";
    }
    else{
        echo "query not executed";
    }
    while($row = pg_fetch_assoc($result)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    ?>
</body>
</html>