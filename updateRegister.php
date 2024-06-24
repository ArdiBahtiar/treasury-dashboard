<?php
include('config.php');
include('check.php');

require 'vendor/autoload.php';
use Ramsey\Uuid\Nonstandard\Uuid;

$date = date('Y-m-d');
$tommorrow = date('Y-m-d', strtotime("tomorrow"));
$uuid = Uuid::uuid4()->toString();
$row = mysqli_fetch_assoc($queryy);
// var_dump($row);
$delete = "DELETE FROM ticket_pools WHERE folio_id = '$vocer'";
$orders = "INSERT INTO orders (order_id, order_date, visit_date, cancelled, merchant_info, cust_name, cust_email, cust_phone) 
            VALUES ('$uuid', '$date', '$tommorrow', 0, '9bf57c2c5d31fef114718441119ae1c9', 'freepass', '', '')";
$orders2 = "UPDATE orders 
            SET total_buy_price = (SELECT product_price FROM catalogs WHERE catalog_id = '$row[catalog_id]') 
            WHERE order_id = '$uuid'";
$cart_items = "INSERT INTO cart_items (cart_id, folio_id, order_id, redeemed, redeemed_date) 
                VALUES ('$uuid-FP-0', '$vocer', '$uuid', 0, '$date')";
$cart_items2 = "UPDATE cart_items 
                SET catalog_id = (SELECT catalog_id FROM catalogs WHERE catalog_id = '$row[catalog_id]'),
                    product_desc = (SELECT product_desc FROM catalogs WHERE catalog_id = '$row[catalog_id]'),
                    product_price = (SELECT product_price FROM catalogs WHERE catalog_id = '$row[catalog_id]')
                WHERE cart_id = '$uuid-FP-0'";                

mysqli_query($conn, $delete);
mysqli_query($conn, $orders);
mysqli_query($conn, $orders2);
mysqli_query($conn, $cart_items);
mysqli_query($conn, $cart_items2);
header("Location: landing.html");
die();

// echo $uuid;
?>