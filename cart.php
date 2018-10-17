<?php

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
      <div class="products">
        <?php

          function getQtyInCart(){

            global $con;

          $ip = getIp();

          $sel_price = "select * from cart where ip_addr = '$ip' ";

              $process_price = mysqli_query($con,$sel_price);

          while ($p_price = mysqli_fetch_array($process_price)) {
              
              return $qty = $p_price['qty'];

            }

          }
          ?>

          <?php 

           $qtys = getQtyInCart();
              
              if($qtys == 0){
                include("templates/noproduct.php");
                echo "<h1> $qtys</h1>";
                  
              }            

              else{
                include("templates/yesproduct.php");

              }

          ?>

      <footer class="footer">Footer</footer>
</body>

   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>