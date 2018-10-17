<?php 
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!isset($_SESSION['user_email'])) {
      
      echo "<script>window.open('login.php?not_admin=Are you an admin','_self')</script>";

      }
  else{
  

?>
<!DOCTYPE html>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<?php
  
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include("includes/connect.php");

 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    
    <div class="wrapper">
      

        
        <div class="menu">
          
          <?php include("header/header.php") ?>

        </div>

       
        <div class="col-sm-8">
          
          <?php

            if (isset($_GET['insert_product'])) {
              include("insert_product.php");
            }

           ?>

            <?php

            if (isset($_GET['view_products'])) {
              include("view_products.php");
            }

           ?>

           <?php

            if (isset($_GET['edit_pro'])) {
              include("edit_pro.php");
            }

           ?>

           <?php

            if (isset($_GET['insert_cat'])) {
              include("insert_cat.php");
            }

           ?>

           <?php

            if (isset($_GET['view_cat'])) {
              include("view_cat.php");
            }

           ?>

            <?php

            if (isset($_GET['edit_cat'])) {
              include("edit_cat.php");
            }

           ?>

           <?php

            if (isset($_GET['insert_brands'])) {
              include("insert_brands.php");
            }

           ?>

           <?php

            if (isset($_GET['view_brands'])) {
              include("view_brands.php");
            }

           ?>

           <?php

            if (isset($_GET['edit_brand'])) {
              include("edit_brand.php");
            }

           ?>

           <?php

            if (isset($_GET['view_customers'])) {
              include("view_customers.php");
            }

           ?>




        </div>
       



    </div>


  </body>



   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>

<?php } ?>