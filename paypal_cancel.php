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
  <h2 class="text-center">Welcome <?php echo $_SESSION['customer_email'] ;?></h2>
  <h3 class="text-center">Your payment was Unsuccessfull! Please try again later.</h3>
  <h3 class="text-center"><a href="http://www.sketchshot.com/demoshop/">Click Here</a></h3>

</body>
</html>