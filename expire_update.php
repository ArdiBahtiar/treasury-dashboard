<?php

    include ('config.php');
    session_start();
    $date = date('Y-m-d');
    $newdate = date('Y-m-d', strtotime('+1 days'));


// $givenDate = "2022-01-31";
// $timestampForGivenDate = strtotime ( $givenDate );
// $englishText = '+1 day';
// $requireDateFormat = "Y-m-d";
// echo date($requireDateFormat,strtotime ( $englishText , $timestampForGivenDate )) ;


 if(isset($_GET['save'])) {
    $_SESSION['voucher'] = $_GET['voucher'];
 }
 $value = $_SESSION['voucher'];

 $query = mysqli_query($conn, "SELECT * FROM `cart_items` WHERE folio_id = '$value'");
 $query_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE order_id = (SELECT order_id FROM `cart_items` WHERE folio_id = '$value')");
 $update = "UPDATE `orders` SET visit_date = '$newdate' WHERE order_id = (SELECT order_id FROM `cart_items` WHERE folio_id = '$value')";

 if(mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        if($row['redeemed'] == 0) {
        while($row2 = mysqli_fetch_assoc($query_orders)) {   
            if($row2['visit_date'] < $date) {
                // update expiry date
                echo "<p style=' text-align:center;'>Tiket telah expired, apakah mau anda Extend?</p> <br>";
                echo "<a href='renew.php'
                            style=' font: bold 50px Arial;
                            text-decoration: none;
                            background-color: #EEEEEE;
                            color: #333333;
                            padding: 2px 6px 2px 6px;
                            border-top: 1px solid #CCCCCC;
                            border-right: 1px solid #333333;
                            border-bottom: 1px solid #333333;
                            border-left: 1px solid #CCCCCC;
                            margin-left:150px;'>
                    Ya, Extend</a>";

                    echo "<a href='indexExpired.php' 
                    style=' font: bold 50px Arial;
                            text-decoration: none;
                            background-color: #EEEEEE;
                            color: #333333;
                            padding: 2px 6px 2px 6px;
                            border-top: 1px solid #CCCCCC;
                            border-right: 1px solid #333333;
                            border-bottom: 1px solid #333333;
                            border-left: 1px solid #CCCCCC;
                            float: right;
                            margin-right: 150px;'> 
                    Tidak</a>";
            }
            else {
                // voucher masih belum expired
                echo "<p style=' text-align:center;'>Tiket masih belum expired</p> <br>";
                        echo "<a href='indexExpired.php' 
                    style=' font: bold 50px Arial;
                            text-decoration: none;
                            background-color: #EEEEEE;
                            color: #333333;
                            padding: 2px 6px 2px 6px;
                            border-top: 1px solid #CCCCCC;
                            border-right: 1px solid #333333;
                            border-bottom: 1px solid #333333;
                            border-left: 1px solid #CCCCCC;
                            display: flex;
                            margin-top: 20px;
                            justify-content: center;'> Kembali ke Halaman Awal</a>";
            }
            }
        }
        else {
            echo "voucher sudah diklaim";
        }
    }
}
    else {
        echo "Invalid Voucher";
    }
?>