<!DOCTYPE HTML>
<html>
    
<head>
    <title>Postgre API Expiry Renewal</title>
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
<form action="expire_update.php" method="get">
Kode Voucher: <input type="text" name="voucher" value="<?php if(isset($_SESSION['voucher']));?>">
<input type="submit" name="save" value="Submit">
</form>

</body>
</html>