 <?php


//connection script
$con = mysqli_connect("localhost", "root", "dellinspiron5521", "ecommerce");


//get customer ip address
function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

 

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

 

    return $ip;

}

//adding to cart table
function cart(){

    global $con;

    $ip = getIp();

    if(isset($_GET['add_cart'])){

        $pro_id = $_GET['add_cart'];

        $check_pro = "select * from cart where ip_addr = '$ip' AND p_id='$pro_id'" ;

        $run_check = mysqli_query($con, $check_pro );


   if(mysqli_num_rows($run_check)>0){

            echo "";
        }
        else{

            $insert_pro = "insert into cart (p_id,ip_addr,qty) values ('$pro_id','$ip','1') ";
            $run_pro = mysqli_query($con, $insert_pro);
            echo "<script>window.open('index.php','_self')</script>";


        }
}

}

//getting total items

function total_items(){

        $total_cart = 0;

       global $con;

    if(isset($_GET['add_cart'])){

     

        $ip = getIp();

        $get_items = "select * from cart where ip_addr='$ip'";

        $run_items = mysqli_query($con,$get_items);

        $count_items = mysqli_num_rows($run_items);

    }

        else{

        $ip = getIp();

        $get_items = "select * from cart where ip_addr='$ip'";

        $run_items = mysqli_query($con,$get_items);

        $count_items = mysqli_num_rows($run_items);
        }
    echo $total_cart += $count_items;
    }

//get total price from cart 

function total_price(){

    $total = 0;

    global $con;

    $ip = getIp();

    $sel_price = "select * from cart where ip_addr = '$ip' ";

    $process_price = mysqli_query($con,$sel_price);

    while ($p_price = mysqli_fetch_array($process_price)) {
        
        $pro_id = $p_price['p_id'];

        $pro_price = "select * from products where product_id = '$pro_id'";

        $run_price = mysqli_query($con,$pro_price);

        while ( $pp_price = mysqli_fetch_array($run_price) ) {


            $pro_price_addition = array($pp_price['product_price']);

            $values = array_sum($pro_price_addition);

            $total += $values;
            
        }
    }

    echo $total;

}


//get category products
function getCats()
{
    
    global $con;
    
    $get_cats = "select * FROM categories";
    
    $run_cats = mysqli_query($con, $get_cats);
    
    while ($row_cats = mysqli_fetch_array($run_cats)) {
        
        $cat_id    = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        
    }
    
    
}

//get Brands
function getBrands()
{
    
    global $con;
    
    $get_brands = "select * FROM brands";
    
    $run_brands = mysqli_query($con, $get_brands);
    
    while ($row_brands = mysqli_fetch_array($run_brands)) {
        
        $brand_id    = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
        
    }
}

//get product
function getPro()
{
    
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['brand'])) {
            
            global $con;
            
            $get_pro = "select * from products order by RAND() LIMIT 0,6";
            
            $run_pro = mysqli_query($con, $get_pro);
            
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                
                $pro_id = $row_pro['product_id'];
                
                $pro_cat = $row_pro['product_cat'];
                
                $pro_brand = $row_pro['product_brand'];
                
                $pro_title = $row_pro['product_title'];
                
                $pro_price = $row_pro['product_price'];
                
                $pro_image = $row_pro['product_image'];
                
                echo "

                <div id='single_product'>

                    <div class='col-sm-3'>
                            <a href='details.php?pro_id=$pro_id' class='title'>
                    <img class='homeimg' src='admin_area/product_images/$pro_image' />
            <h2>$pro_title</h2></a>
                    <p class='price'><b>₹$pro_price</b></p>
                    <a href='index.php?add_cart=$pro_id'><button>Add to Cart</button></a>

                </div>    
                </div>


            ";
                
                
                
            }
            
        }
        
    }
}

//get category on category page
function getCatPage()
{
    
    if (isset($_GET['cat'])) {
        
        $cat_id = $_GET['cat'];
        
        global $con;
        
        $get_cat_pro = "select * from products where product_cat='$cat_id'";
        
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
        
        $count_cats = mysqli_num_rows($run_cat_pro);
        
                    if ($count_cats == 0) {
                
                echo "<h2 class='text-center'>There is no product in this category</h2>";
            }

        
        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
            
            $pro_id = $row_cat_pro['product_id'];
            
            $pro_cat = $row_cat_pro['product_cat'];
            
            $pro_brand = $row_cat_pro['product_brand'];
            
            $pro_title = $row_cat_pro['product_title'];
            
            $pro_price = $row_cat_pro['product_price'];
            
            $pro_image = $row_cat_pro['product_image'];

                    
                echo "

                <div id='single_product'>

                    <div class='col-sm-3'>
                            <a href='details.php?pro_id=$pro_id' class='title'>
                    <img class='homeimg' src='admin_area/product_images/$pro_image' />
            <h2>$pro_title</h2></a>
                    <p class='price'><b>₹$pro_price</b></p>
                    <a href='index.php?pro_id=$pro_id'><button>Add to Cart</button></a>

                </div>    
                </div>


            ";
                
                
                
            }
            
        }
    
}

//get brands on brand page
function getBrandPage()
{
    
    if (isset($_GET['brand'])) {
        
        $brand_id = $_GET['brand'];
        
        global $con;
        
        $get_brand_pro = "select * from products where product_brand='$brand_id'";
        
        $run_brand_pro = mysqli_query($con, $get_brand_pro);
        
        $count_cats = mysqli_num_rows($run_brand_pro);
        
                    if ($count_cats == 0) {
                
                echo "<h2 class='text-center'>There is no product in this Brand</h2>";
            }
        
        while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
            
            $pro_id = $row_brand_pro['product_id'];
            
            $pro_cat = $row_brand_pro['product_cat'];
            
            $pro_brand = $row_brand_pro['product_brand'];
            
            $pro_title = $row_brand_pro['product_title'];
            
            $pro_price = $row_brand_pro['product_price'];
            
            $pro_image = $row_brand_pro['product_image'];
            
            echo "

                <div id='single_product'>

                    <div class='col-sm-3'>
                            <a href='details.php?pro_id=$pro_id' class='title'>
                    <img class='homeimg' src='admin_area/product_images/$pro_image' />
            <h2>$pro_title</h2></a>
                    <p class='price'><b>₹$pro_price</b></p>
                    <a href='index.php?pro_id=$pro_id'><button>Add to Cart</button></a>

                </div>    
                </div>


            ";
            
            
            
        }
        
    }
    
} 