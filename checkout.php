<!DOCTYPE html>
<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("functions/functions.php");

?>
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
      <div class="checkout">

        <div class="container">
          
          <?php 

          if (!isset($_SESSION['customer_email'])) {
              
              include("customer_login.php");
          }
          else{

              include("payment.php");
          }


          ?>
          
        </div>


      </div>
      <footer class="footer">Footer</footer>
</body>

   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>