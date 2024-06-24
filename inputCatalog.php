<?php
include('config.php');
session_start();
if(isset($_GET['save'])) {
    $_SESSION['catalog_id'] = $_GET['catalog_id'];
    $_SESSION['product_desc'] = $_GET['product_desc'];
    $_SESSION['product_price'] = $_GET['product_price'];
    $_SESSION['product_info'] = $_GET['product_info'];
}
$catalog_id = $_SESSION['catalog_id'];
$product_desc = $_SESSION['product_desc'];
$product_price = $_SESSION['product_price'];
$product_info = $_SESSION['product_info'];

$insert = mysqli_query($conn, ("INSERT INTO catalogs VALUES ('$catalog_id', '$product_desc', $product_price, '$product_info')"));
header("Location: landing.html");
die();
?>