<!DOCTYPE HTML>
<html>
    
<head>
    <title>Postgre API Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <img src="image/kidzania-logo.jpg" alt="kidzania" width="100px">
    <form action="table.php">
        <input type="submit" value="Voucher yang sudah di-Klaim" class="claimed">
    </form>
    <img src="image/tlclogo.jpg" alt="tlc" width="100px">
</div>
<form action="check.php" method="get">
Kode Voucher: <input type="text" name="vocer" value="<?php if(isset($_SESSION['vocer']));?>">
<input type="submit" name="save" value="Submit">
</form>

</body>
</html>