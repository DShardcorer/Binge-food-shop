<?php

$con = pg_connect("host=localhost port=5432 dbname=mystore user=postgres password=admin");
if(!$con){
    echo "Not connected";
}

?>

