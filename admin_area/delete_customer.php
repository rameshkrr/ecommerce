<?php 
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!isset($_SESSION['user_email'])) {
      
      echo "<script>window.open('login.php?not_admin=Are you an admin','_self')</script>";

      }
  else{

	 $con2 = mysqli_connect("localhost","root","dellinspiron5521","ecommerce");

	if (isset($_GET['delete_c'])) {
		
		 $delete_id = $_GET['delete_c'];

		$delete_pro = "delete from customers where customer_id='$delete_id'";

		$run_delete = mysqli_query($con2,$delete_pro);

		if($run_delete){

			echo "<script>alert('Customer Deleted')</script>";
			echo "<script>window.open('index.php?view_customers','_self')</script>";

		}
	}
}