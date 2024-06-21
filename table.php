<?php
include("claimed.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-12">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>
         <th>Number</th>
         <th>cart ID</th>
         <th>catalog ID</th>
         <th>description</th>
         <th>price</th>
         <th>folio</th>
         <th>order</th>
         <th>redeemed</th>
         <th>redeemed date</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>

      <td><?php echo $sn?></td>
      <td><?php echo $data['cart_id']??''; ?></td>
      <td><?php echo $data['catalog_id']??''; ?></td>
      <td><?php echo $data['product_desc']??''; ?></td>
      <td><?php echo $data['product_price']??''; ?></td>
      <td><?php echo $data['folio_id']??''; ?></td>
      <td><?php echo $data['order_id']??''; ?></td>
      <td><?php echo $data['redeemed']??''; ?></td>
      <td><?php echo $data['redeemed_date']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>