<form method="POST" action="">
			
			<table width="500" align="center">
				
				<tr align="center">
					<td colspan="4"><h2>Login or Register to continue</h2></td>
				</tr>
				<tr>
					<td align="right">Email</td>
					<td><input type="text" name="email" placeholder="Enter Email" required /></td>
				</tr>

				<tr>
					<td align="right">Password</td>
					<td>
						<input type="password" name="pass" placeholder="password" required />
					</td>
				</tr>

				<tr align="center">
					<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
				</tr>

				<tr>
					<td colspan="3">
						<input class="register" type="submit" name="login" value="Login">
					</td>
				</tr>

			</table>

			<h2 class="register"><a href="customer_register.php">Register</a></h2>

		</form>

		<?php 
		

			global $con;
			if (isset($_POST['login'])) {

				$email = $_POST['email'];
				$pass = $_POST['pass'];

				$sel_c = "select * from customers where customer_pass='$pass' AND customer_email='$email'";

				$run_c = mysqli_query($con ,$sel_c);

				$check_customer = mysqli_num_rows($run_c);
		if($check_customer == 0){
					echo "<script>alert('Email or Password is Wrong');</script>";
					exit();
				}

				$ip = getIp();
				
				$sel_cart = "select * from cart where ip_addr = '$ip' ";

			    $run_cart = mysqli_query($con , $sel_cart);

			    $check_cart = mysqli_num_rows($run_cart);

			    if($check_customer > 0 AND $check_cart == 0){

			    	$_SESSION['customer_email'] = $email;

			        echo "<script>alert('Logged In Succesfully')</script>";
			        echo "<script>window.open('customer/my_account.php','_self')</script>";


			    }
				else{

					$_SESSION['customer_email'] = $email;

			        echo "<script>alert('Logged In Succesfully')</script>";
			        echo "<script>window.open('checkout.php','_self')</script>";

				}
			}


		?>
