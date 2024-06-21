<?php

include('config.php');
session_start();
if(isset($_GET['save'])) {
    $_SESSION['vocer'] = $_GET['vocer'];
}
$vocer = $_SESSION['vocer'];

$queryy = mysqli_query($conn, "SELECT * FROM `ticket_pools` WHERE folio_id = '$vocer'");

if(mysqli_num_rows($queryy) > 0) {
    echo "<p style='text-align: center;'>ada bos</p>";
    echo "<br><br><br>";
    echo "<a href='updateRegister.php'
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
    Ya, Register</a>";


    echo "<a href='indexRegister.php' 
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
    echo "<p style='text-align: center;'>Invalid Bos</p>";
    echo "<br><br><br>";
    echo "<a href='indexRegister.php' 
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

?>