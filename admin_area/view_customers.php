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
<table width="790px" align="center" class="formedit">
	
	<tr align="center">
		<td colspan="6"><h2>View All Customers</h2></td>
	</tr>

	<tr align="center" bgcolor="black" style="color: #fff;height: 40px;">
		<th style="padding-left: 10px;">Id</th>

		<th>Id</th>

		<th>Name</th>

		<th>Email</th>


		<th>Delete</th>

	</tr>

	<?php

			$get_c = "select * from customers";
			$run_pro = mysqli_query($con,$get_c);
			$i = 0;
			while ($row_pro = mysqli_fetch_array($run_pro)) {

				$pro_id = $row_pro['customer_id'];
				$pro_title = $row_pro['customer_name']; 
				$pro_image = $row_pro['customer_image']; 
				$pro_email = $row_pro['customer_email'];
				$i++;

	 ?>

	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $pro_title ?></td>
		<td><img src="../customer/customer_images/<?php echo $pro_image?>" width="50"></td>
		<td><?php echo $pro_email ?></td>
		<td><a href="delete_customer.php?delete_c=<?php echo $pro_id ?>">Delete</a></td>

	</tr>
<?php } } ?>
</table>