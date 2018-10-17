<!DOCTYPE html>
<?php
	
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
      <div class="products">

        <div class="cart">
            



        </div>
        <div class="container">
        
            <?php


            if (isset($_GET['search'])) {

                $search_query = $_GET['user_query'];


            $get_pro = "select * from products where product_keyword like '%$search_query%' ";

            $run_pro = mysqli_query($con, $get_pro);
           
            while($row_pro = mysqli_fetch_array($run_pro)){

            $pro_id  = $row_pro['product_id'];

            $pro_title  = $row_pro['product_title'];
            
            $pro_price  = $row_pro['product_price'];
            
            $pro_image  = $row_pro['product_image'];

            $pro_desc = $row_pro['product_desc'];
        

            echo "
            <div id='single_product'>

                    <div class='col-sm-3'>
                            <a href='details.php?pro_id=$pro_id' class='title'>
                    <img class='homeimg' src='admin_area/product_images/$pro_image' />
            <h2>$pro_title</h2></a>
                    <p class='price'><b>₹$pro_price</b></p>
                    <a href='index.php?pro_id=$pro_id'><button>Add to Cart</button></a>

                </div>    
                </div>
                 ";
            

    }
            }


            ?>
         <div class="col-sm-3">sidebar</div>
</div>


      </div>
      <footer class="footer">Footer</footer>
</body>

   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>