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
	if (isset($_GET['edit_cat'])) {

		$cat_id = $_GET['edit_cat'];

		$get_cat = "select * from categories where cat_id='$cat_id' ";

		$run_cat = mysqli_query($con2,$get_cat);

		$row_cat = mysqli_fetch_array($run_cat);

		$cat_id = $row_cat['cat_id'];

		$cat_title = $row_cat['cat_title'];

	}

?>
<form action="" method="POST" style="margin-top: 70px;margin-left: 20px;">
	
	<b>Edit Category</b>
	<input type="text" name="new_cat" value="<?php echo $cat_title;?>" />
	<input type="submit" name="edit_cat" value="Edit Name">

</form>

<?php 
	
	
$con2 = mysqli_connect("localhost","root","dellinspiron5521","ecommerce");
	
	if (isset($_POST['edit_cat'])) {

		$update_id = $cat_id;
		$new_cat = $_POST['new_cat'];
		$insert_cat = "update categories set cat_title='$new_cat' where cat_id='$update_id'";
	$run_cat = mysqli_query($con2,$insert_cat);

	if ($run_cat) {
		echo "<script>alert('category Edited')</script>";
			echo "<script>window.open('index.php?view_cat','_self')</script>";
			exit();
	}
	}
	
}
?>