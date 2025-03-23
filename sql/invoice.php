<?php
include("connection/connect.php");

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bill Receipt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
  <style>
    body {
      
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      border: 1px solid #f14b09;
      padding: 20px;
    }
    .container img{
      height: 50px;
      width: 50px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .table {
      
      width: 100%;
      border-collapse: collapse;
    }
    .table th, .table td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }
    .table th {
      background-color: #f2f2f2;
    }
    .total {
      margin-top: 20px;
      text-align: right;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
  
    <div class="header">
      
        <h1>GROCERY MART</h1>
      <h3>Bill Receipt</h3>
      <p>Date: 2024-02-17</p>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Item No.</th>
          <th>Invoice No.</th>
          <th>Amount</th>
          <th>Order Date</th>
          <th>Total</th>
        </tr>
      </thead>
     <?php
     if(isset($_GET['o_id'])){
      $o_id=$_GET['o_id'];
     
     $select_query="Select * from user_orders WHERE o_id = $o_id";
     $result_query=mysqli_query($con,$select_query);
     $number=0;
     while($row_orders=mysqli_fetch_assoc($result_query)){
      $o_id=$row_orders['o_id'];
      $amount_due=$row_orders['amount_due'];
      $invoice_number=$row_orders['invoice_number'];
      $order_date=$row_orders['order_date'];
      
      $number++;
      echo "<tr>
      <td>$number</td>
      <td>$invoice_number</td>
      <td>$amount_due</td>
      <td>$order_date</td>
      <td>$amount_due</td>
     ";
     }
    }
    ?>
    </table>
    <div class="total">
      <p>Total:<?php echo"<span>&#8377;</span>$amount_due";?></p>
      <a href="../users_area/profile.php"><button type="button" class="btn btn-primary">Back</button>
    </div>
    

                    
   
  </div>
</body>
</html>
<?php

?>