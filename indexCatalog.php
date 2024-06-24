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
<form action="inputCatalog.php" method="get">
catalog_id: <input type="text" name="catalog_id" value="<?php if(isset($_SESSION['catalog_id']));?>">
product_desc: <input type="text" name="product_desc" value="<?php if(isset($_SESSION['product_desc']));?>">
product_price: <input type="number" name="product_price" value="<?php if(isset($_SESSION['product_price']));?>">
product_info: <input type="text" name="product_info" value="<?php if(isset($_SESSION['product_info']));?>">
<input type="submit" name="save" value="Submit">
</form>

</body>
</html>