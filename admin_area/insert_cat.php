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
<form action="" method="POST" style="margin-top: 70px;margin-left: 20px;">
	
	<b>Insert New Category</b>
	<input type="text" name="new_cat" />
	<input type="submit" name="add_cat" value="Add New Category">

</form>

<?php 
	
	$con2 = mysqli_connect("localhost","root","dellinspiron5521","ecommerce");

	
	if (isset($_POST['add_cat'])) {
		$new_cat = $_POST['new_cat'];
		$insert_cat = "insert into categories (cat_title) values ('$new_cat')";
	$run_cat = mysqli_query($con2,$insert_cat);

	if ($run_cat) {
		echo "<script>alert('category Added')</script>";
			echo "<script>window.open('index.php?view_cat','_self')</script>";
			exit();
	}
	}
	
}
?>