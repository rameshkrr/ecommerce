<?php
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include("includes/connect.php");

 ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>


    <link href="css/stylelogin.css" rel="stylesheet">
  </head>

  <body>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Admin Login</h2>

  <form class="login-container" method="POST" action="login.php">
    <p><input type="text" name="aemail" placeholder="Email"  required /></p>
    <p><input type="password" name="apass" placeholder="Password"  required /></p>
    <p><input type="submit" name="alogin" value="Log in"></p>
  </form>
</div>
</body>
 <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </html>

<?php
  global $con;

  if (isset($_POST['alogin'])) {
    
    $email = mysqli_real_escape_string($con,$_POST['aemail']);
    $pass = mysqli_real_escape_string($con,$_POST['apass']);

    $sel_user = "select * from admins where user_email= '$email' AND user_pass='$pass'";
    $run_user = mysqli_query($con,$sel_user);
    $check_u = mysqli_num_rows($run_user);

    if ($check_u == 0) {
      echo "<script>alert('Email or password is wrong')</script>";
    }

    else{
      $_SESSION['user_email'] = $email;

      echo "<script>window.open('index.php','_self')</script>";
    }

  }


 ?>