<!DOCTYPE html>
<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("functions/functions.php");

$ip = getIp();


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
      <div class="register_page">

        <div class="container">
          
         <form action="customer_register.php" method="POST" enctype="multipart/form-data">
           
           <table align="center" width="740">
             <tr align="center">
               <td colspan="6"><h2>Create an Account</h2></td>
             </tr>

             <tr>
               <td align="right">Customer Name</td>
               <td><input type="text" name="c_name" required /></td>
             </tr>


             <tr>
               <td align="right">Customer Email</td>
               <td><input type="text" name="c_email" required/></td>
             </tr>


             <tr>
               <td align="right">Customer Password</td>
               <td><input type="password" name="c_pass" required/></td>
             </tr>

              <tr>
               <td align="right">Customer Image</td>
               <td><input type="file" name="image" /> </td>
             </tr>


             <tr>
               <td align="right">Customer country</td>
               <td>
                 <select name="c_country">
                   <option>Select Country</option>
                   <option>India</option>
                   <option>China</option>
                   <option>Canada</option>
                 </select>
               </td>
             </tr>


             <tr>
               <td align="right">Customer City</td>
               <td><input type="text" name="c_city" required/></td>
             </tr>


             <tr>
               <td align="right">Customer Contact</td>
               <td><input type="text" name="c_contact" required/><td>
             </tr>

             <tr>
               <td align="right">Customer Address</td>
               <td><textarea cols="20" rows="5" name="c_address" required></textarea></td>
             </tr>

             <tr align="center">
               <td colspan="6"><input type="submit" name="register" value="Create account" /></td>
             </tr>


           </table>

         </form>
          
        </div>


      </div>
</body>

   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>

<?php 

    
 global $con;
  

  if (isset($_POST['register'])) {
      
      
      $c_name = $_POST['c_name'];
      $c_email = $_POST['c_email'];
      $c_pass = $_POST['c_pass'];
      $c_image2 = $_FILES['image']['name'];
    $c_image_tmp2 = $_FILES['image']['tmp_name'];
      
      $c_country = $_POST['c_country'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];

     move_uploaded_file($c_image_tmp2, "customer/customer_images/$c_image2");

      $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values ('$ip','$c_name',
      '$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image2','$c_address')";

      $run_c = mysqli_query($con,$insert_c);

      $sel_cart = "select * from cart where ip_addr = '$ip' ";

      $run_cart = mysqli_query($con , $sel_cart);

      $check_cart = mysqli_num_rows($run_cart);

      if($check_cart == 0){

          $_SESSION['customer_email'] = $c_email;

          echo "<script>alert('Registration Successfully')</script>";
          echo "<script>window.open('customer/my_account.php','_self')</script>";

      }

      else{

          $_SESSION['customer_email'] = $c_email;

          echo "<script>alert('Registration Successfully')</script>";
          echo "<script>window.open('checkout.php','_self')</script>";
      }
  }

?>