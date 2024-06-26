<?php
include('config.php');
include('indexOrders.php');
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
// define('SHOW_FORM', false);

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

<div class="label-landingOrder">
    <br><br><br><h2>FOLIO ID YANG DI ORDER</h2>
</div>
 <?php
 for($echo = 0; $echo < $counter; $echo++)
 {
     echo "<p class='label-landingOrder'>$folioList[$echo]<p>";
 }
 ?> 
<a class="back-button" href="indexOrders.php">Kembali ke Halaman Awal</a>

</body>
</html>