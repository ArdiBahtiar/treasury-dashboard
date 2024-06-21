<?php
//      KONFIGURASI DATABASE
// $servername = "192.168.100.5";
// $username = "hris";
// $password = "kzsubit";
// $dbname = "tlc";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "tlc-dummy";

$host = "localhost";
$username = "root";
$password = "";
$database = "postgre_api";

$conn = new mysqli($host, $username, $password, $database);

if(!$conn) {
    echo 'Gagal Nyambung';
    exit;
}
?>