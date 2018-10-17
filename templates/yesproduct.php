
<div class="container">
          

          <div class="cart">
          	
          	<form action="" method="post" enctype="multipart/form-data">
          		

          		<table align="center" width="550">
          		

          			<tr align="center">
          				
          				<th>Remove <!-- <?php Echo $product_title; ?> --> </th>

          				<th>Products</th>

          				<th>Qty</th>

          				<th>total Price</th>

          			</tr>

                

  			<?php 

  				

			    global $con;

			    $ip = getIp();

			    $sel_price = "select * from cart where ip_addr = '$ip' ";

			    $process_price = mysqli_query($con,$sel_price);

			    while ($p_price = mysqli_fetch_array($process_price)) {
			        
			        $pro_id = $p_price['p_id'];

			        $pro_price = "select * from products where product_id = '$pro_id'";

			        $run_price = mysqli_query($con,$pro_price);

			        while ( $pp_price = mysqli_fetch_array($run_price) ) {


			            $pro_price_addition = array($pp_price['product_price']);

			            $product_title = $pp_price['product_title'];

			            $product_image = $pp_price['product_image'];

			            $single_price =	 $pp_price['product_price']; 	

			            $values = array_sum($pro_price_addition);

			            //$total += $values;
			            
			  
  			?>

          			<tr>
          				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" autocomplete="off" /></td>
          				<td><?php echo $product_title; ?>
          				<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="40">
          				</td>
          				<td><input type="text" size="4" name="qty" value="<?php echo getQtyInCart() ?>"></td>
              
          				<?php

          					if (isset($_POST['update_cart'])) {
          						
          						$qty = $_POST['qty'];

          						$update_qty = "update cart set qty = '$qty'  ";

          						$run_update_qty = mysqli_query($con,$update_qty);

                      
                      $qty  = getQtyInCart();
          						$total = $single_price * $qty;


          					}

          				 ?>
          				<td><?php echo "$" . $single_price ?></td>
          			</tr>

         

          			<?php  } } ?>

          				<tr align="right">

                    <?php 

                      $qty  = getQtyInCart();
                      $total = $single_price * $qty; 

                    ?> 

          				<td colspan="4"><b>Sub Total:</b></td>
          				<td colspan="4"><?php echo $total ?></td>
          			</tr>

          			<tr align="center">
          				<td colspan="2"><input type="submit" name="update_cart" value ="Update Cart"></td>

          				<td><input type="submit" name="continue" value="continue Shopping"></td>

          				<td><a href="checkout.php" class="btn">Checkout</a></td>
          			</tr>
          			
          		</table>

          	</form>

          	<?php 



          		global $con;

          		$ip = getIp();

          		if (isset($_POST['update_cart'])) {

          			foreach ($_POST['remove'] as $remove_id) {
          				
          				$delete_product = "delete from cart where p_id = '$remove_id' AND ip_addr='$ip' ";

          				$run_delete = mysqli_query($con,$delete_product);

          				if($run_delete){

          					echo "<script>window.open('cart.php','_self')</script>";
          				}


          			}
          		}

          		if (isset($_POST['continue'])) {
          			echo "<script>window.open('index.php','_self')</script>";
          		}

          	?>

          </div>
           <?php

            cart();
           ?>

        
</div>


      </div>