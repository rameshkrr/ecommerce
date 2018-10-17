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
                        <?php
                          getBrands();
                          ?>
                   </ul>
                   <ul class="nav navbar-nav menu">
                     
                       <li><a href="">My Account</a></li>

                     <?php 

        if (!isset($_SESSION['customer_email'])) {
          echo "<li><a href='checkout.php'>Login</a></li>";
          $cartname = "Goto cart";
        }
        else {
          echo "<li><a href='logout.php'>Logout</a></li>";
          $cartname = "Back To Shop";
        }
     

       ?>
                   </ul>

                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
        </header>
        <div class="cartitems">

          <ul class="pull-left">
            
      <form method="get" action="results.php" enctype="multipart/form-data">
                     
                     <input type="text" name="user_query" placeholder="search" />
                     <input type="submit" name="search" value="search">

                   </form>

          </ul>
    
    <ul>

      <?php 

        if (!isset($_SESSION['customer_email'])) {
          
          $cartname = "Goto cart";
          $link = "cart.php";
          $name = "Guest";
        }
        else {
          
          $cartname = "Back To Shop";
          $link = "cart.php";
          $name = $_SESSION['customer_email'];
        }
     

       ?>

      
       <h5><b>Welcome <span style="text-transform: capitalize;color: yellow"><?php echo $name; ?></span>  Shopping cart Total cart items=<?php total_items(); ?> and Tota Price = ₹<?php total_price(); ?> <a style="color: yellow" href="<?php echo $link; ?>"><?php echo $cartname; ?></a></b></h5>
       

    </ul>
          
         


        </div>