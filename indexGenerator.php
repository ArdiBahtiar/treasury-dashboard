<?php
include('config.php');
require 'vendor/autoload.php';
use Ramsey\Uuid\Nonstandard\Uuid;

// Query to get all catalogs
$queryCatalogs = "SELECT * FROM catalogs";
$options = mysqli_query($conn, $queryCatalogs);

// Check if form is submitted
if(isset($_POST['submit']))
{
    $category = $_POST['category']; // Get the category from the user selection
    $counter = intval($_POST['counter']); // Get the counter value from user input

    for($i = 0; $i < $counter; $i++)
    {
        $uuid = Uuid::uuid4()->toString(); // Generate a new UUID for each iteration
        $insert = "INSERT INTO ticket_pools (catalog_id, folio_id) VALUES('$category', '$uuid')";
        mysqli_query($conn, $insert);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Postgre API Generate</title>
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
<form method="post">
    <label>Berapa Kali? :</label>
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

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
