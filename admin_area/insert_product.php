<?php
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!isset($_SESSION['user_email'])) {
      
      echo "<script>window.open('login.php?not_admin=Are you an admin','_self')</script>";

      }
  else{
  include("includes/connect.php");
 ?>

    
    <form  action="insert_product.php" method="post" enctype="multipart/form-data">
      
      <table align="center" width="780px" border="1" class="formproduct">
        <tr align="center">
          <td colspan="8" ><h2>Insert New Product</h2></td>
        </tr>
        <tr>
          <td align="left">Product title:</td>
          <td><input type="text" name="product_title" size="60" required/></td>
        </tr>
         <tr>
          <td align="left">Product Category:</td>
          <td>
            <select name="product_cat" required>
              
              <option>Select Category</option>
              <?php 
              $get_cats = "select * FROM categories";

            $run_cats = mysqli_query($con,$get_cats);

            while ($row_cats=mysqli_fetch_array($run_cats)){

              $cat_id = $row_cats['cat_id'];
              $cat_title = $row_cats['cat_title'];

              echo "<option value='$cat_id'>$cat_title</option>";

  }

              ?>
            </select>
          </td>
        </tr>
         <tr>
          <td align="left">Product Brand:</td>
          <td>
              <select name="product_brand" required>
              
              <option>Select Brand</option>
             <?php
  $get_brands = "select * FROM brands";

  $run_brands = mysqli_query($con,$get_brands);

  while ($row_brands=mysqli_fetch_array($run_brands)){

    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];

    echo "<option value='$brand_id'>$brand_title</option>";

  }
  ?>
            </select>
          </td>
        </tr>
         <tr>
          <td align="left">Product Image:</td>
          <td><input type="file" name="product_image" /></td>
        </tr>
         <tr>
          <td align="left">Product Price:</td>
          <td><input type="text" name="product_price" required/></td>
        </tr>
         <tr>
          <td align="left">Product Description:</td>
          <td><textarea id="textareaa" name="product_desc"></textarea></td>
        </tr>
         <tr>
          <td align="left">Product Seo:</td>
          <td><input type="text" name="product_keyword" /></td>
        </tr>

         <tr align="center">
          <td colspan="8"><input type="submit" name="insert_post" value="Add Product" /></td>
        </tr>
      </table>

    </form>

  <?php

    if (isset($_POST['insert_post'])) {
        
        //getting the text data from the fields
        $product_title = $_POST['product_title'];

        $product_cat = $_POST['product_cat'];

        $product_brand = $_POST['product_brand'];

        $product_price = $_POST['product_price'];

        $product_desc = $_POST['product_desc'];

        $product_keywords = $_POST['product_keyword'];

        //getting the image from the fields
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp, "product_images/$product_image");

        $insert_product = "insert into products
         (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keyword) values 
        ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image',
        '$product_keywords')";

        $insert_pro = mysqli_query($con,$insert_product);

        if($insert_pro){
          echo "<script>alert('Product added successfully')</script>";
           echo "<script>window.open('index.php?insert_product','_self')</script>";
        }

    }

}
   ?>