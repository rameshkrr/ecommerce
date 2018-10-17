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
		<td colspan="6"><h2>View All Brands</h2></td>
	</tr>

	<tr align="center" bgcolor="black" style="color: #fff;height: 40px;">
		<th style="padding-left: 10px;">Brand Id</th>



		<th>Brand Title</th>

		<th>Edit</th>

		<th>Delete</th>

	</tr>

	<?php

			$get_cat = "select * from brands";
			$run_pro = mysqli_query($con,$get_cat);
			$i = 0;
			while ($row_pro = mysqli_fetch_array($run_pro)) {

				$pro_id = $row_pro['brand_id'];
				$pro_title = $row_pro['brand_title']; 
				$i++;

	 ?>

	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $pro_title ?></td>
		<td><a href="index.php?edit_brand=<?php echo $pro_id ?>">Edit</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $pro_id ?>">Delete</a></td>

	</tr>
<?php } }?>
</table>