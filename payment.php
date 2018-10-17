<?php 
	
	 $total = 0;

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

            $pro_name = $pp_price['product_title'];

            $values = array_sum($pro_price_addition);

            $total += $values;
            
        }
    }


?>
<div class="container" >
	<h2 class="text-center" style="margin-top: 180px;">Pay Using Paypal</h2>

	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="salesaccount@shop.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $$pro_name; ?>">
  <input type="hidden" name="amount" value="<?php echo $total; ?>">
  <input type="hidden" name="currency_code" value="INR">

  <input type="hidden" name="return" value="http://www.sketchshot.com/demoshop/paypal_success.php" />
  <input type="hidden" name="cancel_return" value="http:www.sketchshot.com/demoshop/paypal_cancel.php" />

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

</div>