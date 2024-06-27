<?php 
include('config.php');
require 'vendor/autoload.php';
use Ramsey\Uuid\Nonstandard\Uuid;

$queryCatalogs = "SELECT * FROM catalogs";
$options = mysqli_query($conn, $queryCatalogs);
$date = date('Y-m-d');
$folioList = array();
// $counter2 = $counter;


session_start();

if(isset($_POST['submit']))
{
    $category = $_POST['category'];
    $counter = intval($_POST['counter']);
    $expiry = date($_POST['expiry']);
    
    $_SESSION['counter'] = $counter;

    for($i = 0; $i < $counter; $i++)
    {
        $topVoucher = mysqli_query($conn, "SELECT * FROM ticket_pools WHERE catalog_id = '$category' ORDER BY id ASC LIMIT 1");
        $row = mysqli_fetch_assoc($topVoucher);
        $uuid = Uuid::uuid4()->toString();
        $delete = "DELETE FROM ticket_pools WHERE folio_id = '$row[folio_id]'";
        $createOrders = "INSERT INTO orders(order_id, order_date, visit_date, cancelled, merchant_info, cust_name, cust_email, cust_phone) VALUES('$uuid', '$date', '$expiry', 0, '9bf57c2c5d31fef114718441119ae1c9', 'freepass', '', '')";
        $createOrders2 = "UPDATE orders SET total_buy_price = (SELECT product_price FROM catalogs WHERE catalog_id = '$row[catalog_id]') WHERE order_id = '$uuid'";
        $cart_items = "INSERT INTO cart_items (cart_id, folio_id, order_id, redeemed, redeemed_date) VALUES ('$uuid-FP-0', '$row[folio_id]', '$uuid', 0, '$date')";
        $cart_items2 = "UPDATE cart_items 
                SET catalog_id = (SELECT catalog_id FROM catalogs WHERE catalog_id = '$row[catalog_id]'),
                    product_desc = (SELECT product_desc FROM catalogs WHERE catalog_id = '$row[catalog_id]'),
                    product_price = (SELECT product_price FROM catalogs WHERE catalog_id = '$row[catalog_id]')
                WHERE cart_id = '$uuid-FP-0'";
                
        mysqli_query($conn, $delete);
        mysqli_query($conn, $createOrders);
        mysqli_query($conn, $createOrders2);
        mysqli_query($conn, $cart_items);
        mysqli_query($conn, $cart_items2);
        array_push($folioList, $row['folio_id']);
        // die();
    }
    $_SESSION['folioList'] = $folioList;
    header("Location: landingOrders.php");
}
?>


<?php
// if (!defined('SHOW_FORM')) {
//     define('SHOW_FORM', true);
// }
// ?>

<!DOCTYPE html>
<html>
<head>
    <title>Postgre API Orders</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <img src="image/kidzania-logo.jpg" alt="kidzania" width="100px">
    <form action="index.php">
        <input type="submit" value="Kembali ke Menu Utama" class="claimed">
    </form>
    <img src="" alt="" width="100px">
</div>
<form method="post">
    <label>Order berapa? :</label>
    <input type="number" name="counter" value="">

    <label>Generate Ticket</label>
    <select name="category" id="category">
    <?php 
        while($category = mysqli_fetch_array($options, MYSQLI_ASSOC)):;
    ?>
    <option value="<?php echo $category['catalog_id'];?>">
        <?php echo $category['product_desc'];?>
    </option>
    <?php endwhile; ?>
    </select>
    <br>

    <label>Expiry Date: </label>
    <input type="date" name="expiry">

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>