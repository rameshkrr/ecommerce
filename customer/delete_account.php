<h2>Do you really want to delete your account?</h2>

<form action="" method="POST">
		
		<input type="submit" name="yes" value="Delete Account" />
		<input type="submit" name="no" value="Never" />

</form>

<?php

	global $con;

	$user = $_SESSION['customer_email'];
	
	if (isset($_POST['yes'])) {

		$delete_customer = "delete from customers where customer_email='$user'";
		$delete_run = mysqli_query($con,$delete_customer);
		echo "<script>alert('We really sorry, your account has been deleted')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
		
	}

	if( isset($_POST['no'])){
		echo "<script>window.open('my_account.php','_self')</script>";
	}

 ?>