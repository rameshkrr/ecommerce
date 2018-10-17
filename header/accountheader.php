    <header>
      <nav id="header" class="navbar navbar-fixed-top navhead">
            <div id="header-container" class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="index.php">Ecommerce</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav menu">
                        <?php
                            getCats();
                            ?>
                   </ul>
                     
                   <ul class="nav navbar-nav menu">
                     
                     <li><a href="">My Account</a></li>

                     <?php 

        if (!isset($_SESSION['customer_email'])) {
          echo "<li><a href='../checkout.php'>Login</a></li>";
          $cartname = "Goto cart";
        }
        else {
          echo "<li><a href='../logout.php'>Logout</a></li>";
          $cartname = "Back To Shop";
        }
     

       ?>
                   </ul>

                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
         <?php

            global $con;

        	$user = $_SESSION['customer_email'];
        	$get_img = "select * from customers where customer_email='$user'";
        	$run_img = mysqli_query($con,$get_img);
        	$row_img = mysqli_fetch_array($run_img);
        	$c_image = $row_img['customer_image'];


         ?>
        <div class="container myaccountli">
        	<ul class="nav navbar">
        		<li><p style="text-align: center"><?php echo "<img src='customer_images/$c_image' width='150' />";?></p></li>
        		<li><a href="my_account.php?my_orders">MY Orders</a></li>

        		<li><a href="my_account.php?edit_account">Edit Account</a></li>

        		<li><a href="my_account.php?change_pass">Change Password</a></li>

        		<li><a href="my_account.php?delete_account">Delete Account</a></li>
        	</ul>
        </div>
        </header>
       
        
       