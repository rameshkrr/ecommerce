<?php 

   global $con;

      $get_customer = "select * from customers where customer_email='$user'";
      
      $run_customer = mysqli_query($con,$get_customer);
      
      $row_customer = mysqli_fetch_array($run_customer);
      
      $id = $row_customer['customer_id'];

      $name = $row_customer['customer_name'];

      $email = $row_customer['customer_email'];

      $pass = $row_customer['customer_pass'];

      $country = $row_customer['customer_country'];

      $city = $row_customer['customer_city'];

      $image = $row_customer['customer_image'];

      $contact = $row_customer['customer_contact'];

      $address = $row_customer['customer_address'];


?>
<div class="register_page">

        <div class="container">

          
         <form action="" method="POST" enctype="multipart/form-data">
           
           <table width="740">
             <tr align="center">
               <td colspan="6"><h2>Upadte Your Account</h2></td>
             </tr>

             <tr>
               <td align="right">Name</td>
               <td><input type="text" name="c_name" value="<?php echo $name; ?>"  required /></td>
             </tr>


             <tr>
               <td align="right">Email</td>
               <td><input type="text" name="c_email" value="<?php echo $email; ?>"  disabled/></td>
             </tr>


             <tr>
               <td align="right">Password</td>
               <td><input type="password" name="c_pass" value="<?php echo $pass; ?>" required/></td>
             </tr>

              <tr>
               <td align="right">Image</td>
               <td><img src="customer_images/<?php echo $image; ?>" width="50"> <input type="file" name="image"  /></td>
             </tr>


             <tr>
               <td align="right">country</td>
               <td>
                 <select name="c_country" disabled>
                   <option><?php echo $country ?></option>
                 </select>
               </td>
             </tr>


             <tr>
               <td align="right">City</td>
               <td><input type="text" name="c_city" value="<?php echo $city; ?>" required/></td>
             </tr>


             <tr>
               <td align="right">Contact</td>
               <td><input type="text" name="c_contact" value="<?php echo $contact; ?>" required/><td>
             </tr>

             <tr>
               <td align="right">Address</td>
               <td><input name="c_address" value="<?php echo $address; ?>" required></input></td>
             </tr>

               
             


           </table>
           <input type="submit" name="update" value="Update account" />

         </form>
          
        </div>

<?php 

      $ip =getIp();
  if (isset($_POST['update'])) {
      
      $customer_id = $id;
      $c_name = $_POST['c_name'];
      $c_pass = $_POST['c_pass'];
      $c_image2 = $_FILES['image']['name'];
    $c_image_tmp2 = $_FILES['image']['tmp_name'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];

     move_uploaded_file($c_image_tmp2, "customer/customer_images/$c_image2");

      $update_c = "update customers set customer_name='$c_name', 
      customer_pass='$c_pass',  customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$id'";

      $run_c = mysqli_query($con,$update_c);

      if($run_c){

        echo "<script>alert('Upadted Successfully')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
      }
  }

?>