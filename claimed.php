<?php

include('config.php');


$db= $conn;
$tableName="cart_items";
$columns= ['cart_id', 'catalog_id', 'product_desc', 'product_price', 'folio_id', 'order_id', 'redeemed', 'redeemed_date'];
$fetchData = fetch_data($db, $tableName, $columns);


function fetch_data($db, $tableName, $columns) {
    if(empty($db)){
        $msg= "Database connection error";
    }
        
    elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
    }
        
    else {
        $columnName = implode(", ", $columns);
        $validated = "SELECT * FROM cart_items WHERE redeemed = 1";
        $result = mysqli_query($db, $validated);

        if($result== true){ 
            if (mysqli_num_rows($result) > 0) {
                $table_row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $table_row;
            } 

            else {
                $msg= "Belum ada yang di-Klaim"; 
            }
        }
            
        else{
            $msg= mysqli_error($db);
        }
    }
    return $msg;
}
?>