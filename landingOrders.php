<?php
include('config.php');
include('indexOrders.php');
// session_start();

$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
$folioList = isset($_SESSION['folioList']) ? $_SESSION['folioList'] : array();
?>

<!DOCTYPE HTML>
<html>
    
<head>
    <title>Orders Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <img src="image/kidzania-logo.jpg" alt="kidzania" width="100px">
    <img src="image/tlclogo.jpg" alt="tlc" width="100px">
</div>
 <?php
 for($echo = 0; $echo < $counter; $echo++)
 {
     echo "'$folioList[$echo]' <br>";
 }
 ?> 
<a class="back-button" href="indexOrders.php">Kembali ke Halaman Awal</a>

</body>
</html>