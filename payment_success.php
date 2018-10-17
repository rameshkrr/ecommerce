<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("functions/functions.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

  </head>
<body>
  <?php include("header/header.php"); ?>
  <?php 

$total = 0;

    global $con;

    $ip = getIp();

    $sel_price = "select * from cart where ip_addr = '$ip' ";

    $process_price = mysqli_query($con,$sel_price);

    while ($p_price = mysqli_fetch_array($process_price)) {
        
        $pro_id = $p_price['p_id'];

        $pro_price = "select * from products where product_id = '$pro_id'";

        $run_price = mysqli_query($con,$pro_price);

        while ( $pp_price = mysqli_fetch_array($run_price) ) {


            $pro_price_addition = array($pp_price['product_price']);

            $pro_name = $pp_price['product_title'];

            $p_id = $pp_price['product_id'];

            $values = array_sum($pro_price_addition);

            $total += $values;
            
        }
    }
          //getting qty 

          $get_qty = "select * from cart where p_id = '$pro_id' ";
          $run_qty mysqli_query($con ,$get_qty);
          $row_qty = mysqli_fetch_array($run_qty);
          $quantity = $row_qty['qty'];


          $user = $_SESSION['customer_email'];

          $get_img = "select * from customers where customer_email='$user'";

          $run_img = mysqli_query($con,$get_img);

          $row_img = mysqli_fetch_array($run_img);

          $c_id = $row_img['customer_id'];

          $c_name = $row_img['customer_name'];

          $amount = $_GET['amt'];
          $currency = $_GET['cc'];
          $trx_id = $_GET['tx'];

            //inserting payment to table 

            $insert_payments = "insert into payments (amount,customer_id,product_id,txn_id,currency) values 
            ('$amount','$c_id','$pro_id','$trx_id','$currency')";

            $run_payments = mysqli_query($con,$insert_payments);

            //inserting order into table  

            $insert_orders = "insert into orders (p_id,c_id,qty) values ($pro_id,$c_id,$quantity)";

            $run_orders = mysqli_query($con , $run_orders);

            //removing from cart

            $empty_cart = "delete from cart where ip_addr = '$ip'";

            $run_cartt = mysqli_query($con,  $empty_cart);



            
?>

  <h2 class="text-center">Welcome <?php echo $_SESSION['customer_email'] ;?></h2>
  <h3 class="text-center">Your payment was successfull</h3>
  <h3 class="text-center"><a href="http://www.sketchshot.com/demoshop/customer/myaccount.php">Click Here</a></h3>


</body>
</html>