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

  if (isset($_GET['edit_pro'])) {
      $get_id = $_GET['edit_pro'];

      $get_pro = "select * from products where product_id ='$get_id'";

      $run_pro = mysqli_query($con,$get_pro);

      $i = 0;

        $row_pro = mysqli_fetch_array($run_pro) ;

        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title']; 
        $pro_image = $row_pro['product_image']; 
        $pro_price = $row_pro['product_price']; 
        $pro_desc = $row_pro['product_desc']; 
        $pro_keyword = $row_pro['product_keyword']; 
        $pro_cat = $row_pro['product_cat']; 
        $pro_brand = $row_pro['product_brand']; 
 
}
 ?>

    
    <form  action="" method="post" enctype="multipart/form-data">
      
      <table align="center" width="780px" border="1" class="formproduct">
        <tr align="center">
          <td colspan="8" ><h2>Edit Product</h2></td>
        </tr>
        <tr>
          <td align="left">Product title:</td>
          <td><input type="text" name="product_title" size="60" value="<?php echo $pro_title ?>"/></td>
        </tr>
         <tr>
          <td align="left">Product Category:</td>
          <td>
            <select name="product_cat" required>
              
              <?php 
              $get_cats = "select * FROM categories";

            $run_cats = mysqli_query($con,$get_cats);

            while ($row_cats=mysqli_fetch_array($run_cats)){

              $cat_id = $row_cats['cat_id'];
              $cat_title = $row_cats['cat_title'];

              echo "<option value='$pro_cat'>$cat_title</option>";

  }

              ?>
              <option><?php echo $cat_title ?></option>
              
            </select>
          </td>
        </tr>
         <tr>
          <td align="left">Product Brand:</td>
          <td>
              <select name="product_brand">
              
               <?php
                $get_brands = "select * FROM brands";

                $run_brands = mysqli_query($con,$get_brands);

                while ($row_brands=mysqli_fetch_array($run_brands)){

                  $brand_id = $row_brands['brand_id'];
                  $brand_title = $row_brands['brand_title'];

                  echo "<option value='$pro_brand'>$brand_title</option>";

  }
  ?>
              <option><?php echo $brand_title ?></option>
            
            </select>
          </td>
        </tr>
         <tr>
          <td align="left">Product Image:</td>
          <td><img src="product_images/<?php echo $pro_image?>" width="60"><input type="file" name="product_image"/></td>
        </tr>
         <tr>
          <td align="left">Product Price:</td>
          <td>Rs.<input type="text" name="product_price" value="<?php echo $pro_price ?>"/></td>
        </tr>
         <tr>
          <td align="left">Product Description:</td>
          <td><textarea id="textareaa" name="product_desc" ><?php echo $pro_desc ?></textarea></td>
        </tr>
         <tr>
          <td align="left">Product Seo:</td>
          <td><input type="text" name="product_keyword" value="<?php echo $pro_keyword ?>" /></td>
        </tr>

         <tr align="center">
          <td colspan="8"><input type="submit" name="update_pro" value="Update Product" /></td>
        </tr>
      </table>

    </form>

  <?php

    if (isset($_POST['update_pro'])) {
        
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

        $update_product = "update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keyword='$product_keywords' where product_id = '$get_id'" ;

        $insert_pro = mysqli_query($con,$update_product);

        if($insert_pro){
          echo "<script>alert('Product Updated successfully')</script>";
           echo "<script>window.open('index.php?view_products','_self')</script>";
           exit();
        }

    }
}

   ?>