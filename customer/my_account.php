<!DOCTYPE html>
<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../functions/functions.php");

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">

  </head>
<body>
	     <div class="products">

        
        <div class="container">
        	<div class="col-sm-4">
        	
  <?php include("../header/accountheader.php"); ?>
</div>
<div class="col-sm-8">
 
          <?php

            global $con;

        	$user = $_SESSION['customer_email'];
        	$get_img = "select * from customers where customer_email='$user'";
        	$run_img = mysqli_query($con,$get_img);
        	$row_img = mysqli_fetch_array($run_img);
        	$c_name = $row_img['customer_name'];


         ?>
        	
        	<?php

        		if (!isset($_GET['my_orders'])) {

        			if (!isset($_GET['edit_account'])){

        				if (!isset($_GET['change_pass'])){

        					if (!isset($_GET['delete_account'])){

        						echo "<b>You can see your Order here</b>";
        						echo "<h2>Welcome  $c_name </h2>";

        					}

        				}
        			}
        		}

        		if (isset($_GET['edit_account'])) {

        			include("edit_account.php");
        		}
        		if (isset($_GET['change_pass'])) {

        			include("change_pass.php");
        		}

        		if (isset($_GET['delete_account'])) {

        			include("delete_account.php");
        		}

        	 ?>
          
          
         


        
</div>
</div>


      </div>
      <footer class="footer">Footer</footer>
</body>

   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>