<?php

$servername="localhost";
$username="root";
$password="";
$dbname="myshope";

$conn = new mysqli($servername, $username, $password , $dbname);


function landingcategory(){

    global $conn;
     
    $get_cats = "select * from categories  order by rand() LIMIT 3";
    
    $run_cats = mysqli_query($conn,$get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_ID'];
        $cat_title = $row_cats['cat_title'];

        $get_pro="select * from products  where cat_ID='$cat_id' LIMIT 1";

        $herin=mysqli_query($conn,$get_pro);

        while($pro_select=mysqli_fetch_array($herin)){
          $cat_img = $pro_select['product_img1'];

        echo "
                <div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
                    <div class='shop-cat-box'>
                        <img class='img-fluid' src='admin_area/product_images/$cat_img' alt='$cat_title ' >
                        <a class='btn hvr-hover' href='category.php?cat=$cat_id'>$cat_title</a>
                    </div>
                </div>        

    ";
    }
  }
}

function landingpro(){

    global $conn;

    if(!isset($_GET['cat'])){

        $get_products = " select * from products order by rand() LIMIT 12";

        $run_products = mysqli_query($conn,$get_products );

        while ($product_fetch = mysqli_fetch_array( $run_products)){
          $pro_id=$product_fetch['product_ID'];
          $pro_title=$product_fetch['product_title'];
          $pro_cat=$product_fetch['cat_ID'];
          $pro_img=$product_fetch['product_img1'];
          $pro_price=$product_fetch['product_price'];


            echo"

            <div class='col-lg-3 col-md-6 special-grid best-seller'>

       <div class='products-single fix'>
           <div class='box-img-hover'>
              
               <img src='admin_area/product_images/$pro_img' class='img-fluid' alt='Image' height=200 width=200>

           
               <div class='mask-icon'>
                   <a class='cart' href='index.php?cart_id=$pro_id'>Add to Cart</a>
               </div>
         
           </div>

           <a href='detail.php?pro_id=$pro_id'>
           <div class='why-text'>
               <h4>$pro_title</h4>
               <h5> $pro_price</h5>
           </div>
           </a>
           
       </div>
  

       </div>

   ";
        }
       }
}

// ************************************************** category page ***********************************************************

function catpagebar(){
    
    global $conn ;

    $get_cats = "select * from categories";
    
    $run_cats = mysqli_query($conn,$get_cats);
    
    while ($row_cats = mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_ID'];
        $cat_title = $row_cats['cat_title'];
    
        echo "
       
        <a href='category.php?cat=$cat_id'><button data-filter='.bulbs'>$cat_title</button></a>
                            
        ";
    }
}


function catpagelogic(){
    if(isset($_GET['cat'])){

        global $conn;

        $cat_ID=$_GET['cat'];
        
        $get_catproducts = " select * from products where cat_ID='$cat_ID'";
        
        $run_catproducts = mysqli_query($conn,$get_catproducts );
        
        while($catproduct_fetch = mysqli_fetch_array( $run_catproducts)){
            $pro_id = $catproduct_fetch['product_ID'];
            $pro_cat = $catproduct_fetch['cat_ID'];
            $pro_img = $catproduct_fetch['product_img1'];
            $pro_title = $catproduct_fetch['product_title'];
            $pro_price = $catproduct_fetch['product_price'];
            echo"
            <div class='col-lg-3 col-md-6 special-grid bulbs'>
             <div class='products-single fix'>
        
             <div class='box-img-hover'>
                 <img src='admin_area/product_images/$pro_img' class='img-fluid' alt='Image'>
                 <div class='mask-icon'>
                     <a class='cart' href='category.php?cart_id=$pro_id'>Add to Cart</a>
                 </div>
             </div>
        
             <a href='detail.php?pro_id=$pro_id'>
             <div class='why-text'>
                 <h4>$pro_title</h4>
                 <h5> $pro_price</h5>
             </div>
             </a>
        
        </div>
        </div>
            ";
        }
        
        }
        
        
        if(!isset($_GET['cat'])){

            global $conn;
        
        $get_ramproducts = " select * from products  order by rand() LIMIT 12";
        
        $run_ramproducts = mysqli_query($conn,$get_ramproducts);
        
        while($ramproduct_fetch = mysqli_fetch_array($run_ramproducts)){
            $pro_id = $ramproduct_fetch['product_ID'];
            $pro_cat = $ramproduct_fetch['cat_ID'];
            $pro_img = $ramproduct_fetch['product_img1'];
            $pro_title = $ramproduct_fetch['product_title'];
            $pro_price = $ramproduct_fetch['product_price'];
            echo"
            <div class='col-lg-3 col-md-6 special-grid bulbs'>
             <div class='products-single fix'>
        
             <div class='box-img-hover'>
                 <img src='admin_area/product_images/$pro_img' class='img-fluid' alt='Image'>
                 <div class='mask-icon'>
                     <a class='cart' href='category.php?cart_id=$pro_id'>Add to Cart</a>
                 </div>
             </div>
        
             <a href='detail.php?pro_id=$pro_id'>
             <div class='why-text'>
                 <h4>$pro_title</h4>
                 <h5> $pro_price</h5>
             </div>
             </a>
        
        </div>
        </div>
            ";
        }
        
        }
        
}

// ***************************************************** detail page ************************************************



// ***************************************************** search result *********************************************

function toptitle(){

    global $conn;

$search = $_GET['search'];
     
if(!empty($search)){

  $get_products = " select * from products where keyword LIKE '%$search%' ";

$run_products = mysqli_query($conn,$get_products );

$product_fetch = mysqli_fetch_array( $run_products);


    $pro_cat = $product_fetch['cat_ID'];
    
    $get_cats = "select * from categories  where cat_ID='$pro_cat'";
    
                          $run_cats = mysqli_query($conn,$get_cats);
        
                        $row_cats = mysqli_fetch_array($run_cats);
                              $cat_title = $row_cats['cat_title'];
                       
echo"

    <div class='products-box'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>

                    <div class='title-all text-center'>
                        <h1>$cat_title </h1>
                        <hr>
                    </div>

                </div>
            </div>

            <div class='row special-list'> 
            ";
}   


function searchproducts(){

    global $conn;
    
    $search = $_GET['search'];
     
    if(!empty($search)){
    
      $get_products = " select * from products where keyword LIKE '%$search%' ";
    
    $run_products = mysqli_query($conn,$get_products );
    
    while ($product_fetch = mysqli_fetch_array( $run_products)){
    
        $pro_id = $product_fetch['product_ID'];
        $pro_title=$product_fetch['product_title'];
        $pro_cat = $product_fetch['cat_ID'];
        $pro_img = $product_fetch['product_img1'];
        $pro_price = $product_fetch['product_price'];
       

   echo"
          
   <div class='col-lg-3 col-md-6 special-grid best-seller'>

<div class='products-single fix'>
  <div class='box-img-hover'>
     
      <img src='admin_area/product_images/$pro_img' class='img-fluid' alt='Image' height=200 width=200>

  
      <div class='mask-icon'>
      <a href='detail.php?pro_id=$pro_id'>
          <a class='cart' href='result.php?cart_id=$pro_id'>Add to Cart</a>
          </a>
      </div>

  </div>

  <a href='detail.php?pro_id=$pro_id'>
  <div class='why-text'>
      <h4>$pro_title</h4>
      <h5> $pro_price</h5>
  </div>
  </a>
  
</div>


</div>


";
}
}


}

}


// ********************************************* cart page ******************************************

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
    }  
 

 function cart(){

  global $conn;

  if(isset($_GET['cart_id'])){

    $user_ip = getIPAddress() ;
    $cart_id = $_GET['cart_id']; 

    $check_pro = "select * from  cart where p_ID='$cart_id' AND ip_add='$user_ip' ";
    $result= mysqli_query($conn,$check_pro );

    if(mysqli_num_rows($result) > 0){
      echo"";
    }
    else{
      $q="INSERT INTO `cart`(`ip_add`,`p_ID`) VALUES ('$user_ip','$cart_id')";
      $resq=mysqli_query($conn,$q);
     }

    }
  
 }   


// **********************************************  cart fuction ***********************************

function cartpro(){
 
    global $conn;
    if(isset($_get['cartdelpro_id'])){

        $cart_del=$_GET['cartdelpro_id'];
   
    $delcart="DELETE FROM `cart` WHERE p_ID='$cart_del' ";
    $rundelcart=mysqli_query($conn,$delcart);
    
}
}
 
// <!-- ***************************************************************************** -->


function cartno(){

    global $conn;
  
    $selectfroncart="SELECT * from  cart";
    $runfun=mysqli_query($conn,$selectfroncart);

    $venus=mysqli_num_rows($runfun);
       echo $venus;
    
}

?>