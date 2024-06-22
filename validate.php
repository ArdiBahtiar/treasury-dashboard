<?php
//      HEADER
    include ('config.php');
    session_start();
    if(isset($_GET['save'])) {
        $_SESSION['vocer'] = $_GET['vocer'];
    }
    $vocer = $_SESSION['vocer'];
    $date = date('Y-m-d');



//      INPUTAN USER $VOCER QUERY KE TABLE DATABASE
    $query = mysqli_query($conn, "SELECT * FROM `cart_items` WHERE folio_id = '$vocer'");
    $update = "UPDATE cart_items SET redeemed = 1, redeemed_date= '$date' WHERE folio_id = '$vocer'";
    $query_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE order_id = (SELECT order_id FROM `cart_items` WHERE folio_id = '$vocer')");


//      MYSQL NUNJUKKAN ROWS KE BERAPA, POKOKE ADA YAWES BENER
    if(mysqli_num_rows($query) > 0) {
//      CEK VALIDITY CODE 0 APA 1        
            while($row = mysqli_fetch_assoc($query)) {      // INI BUAT NYARI DATA BERUPA ARRAY DARI ROW YANG SUDAH DICARI
                if($row['redeemed'] == 0) {
                    while($row2 = mysqli_fetch_assoc($query_orders)) {
                        if($row2['visit_date'] > $date) {
                            echo "<p style=' text-align:center;'>Tiket bisa diklaim, Apakah mau langsung anda Klaim?</p> <br>";
                            echo "<a href='update.php'
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
                            Ya, Klaim</a>";
                            
                            
                            echo "<a href='index.php' 
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
                            echo "<p style=' text-align:center;'>Tiket telah expired</p> <br>";
                            echo "<a href='index.php' 
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
                    echo "<p style=' text-align:center;'>Ticket telah di-redeem pada tanggal: </p>" . $row["redeemed_date"];
                    echo "<a href='index.php' 
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
            echo "<p style=' text-align:center;'>Invalid Voucher</p>";

            echo "<br><br><br>";
            echo "<a href='index.php' 
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
                    justify-content: center;'> 
            Kembali ke Halaman Awal</a>";
        }


//      BIAR DISCONNECT SAMA MYSQL
    // $conn->close();


//      QUERY VOUCHER YANG SUDAH DI-KLAIM

?>