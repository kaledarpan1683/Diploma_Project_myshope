<?php

session_start();
include('includes/db.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<style>
* {
  box-sizing: border-box;
  margin:0;
  padding:0;
}

html{

  font-size:62.5%;
}

.title{
  width: 100%;
  height:5rem;
  color:white;
  background-color:black;
  display:flex;
  justify-content:center;
  align-items:center;

}

.title-home{
  width: 100%;
  height:5rem;
  color:white;
  margin-left:30px;
  display:flex;
  justify-content:flex-start;
  align-items:center;

}
.title-home button{
    height:50%;
    width: 5%;
}
.title-home a{
    text-decoration:none;
    color:black;
}

.title p{
  font-size:2rem;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 1.2rem;
  border: .1rem solid #ccc;
  border-radius: .4rem;
  resize: vertical;
}

label {
  padding: 1.2rem 1.2rem 1.2rem 0;
  display: inline-block;
  font-size:1.5rem;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 1.2rem 2rem;
  border: none;
  border-radius: .4rem;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: .5rem;
  background-color: #f2f2f2;
  padding: 2rem;
  height:94vh;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: .6rem;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: .6rem;
}

#productkeyword{
margin:1rem;
position: relative;
right: 1rem;
bottom:1rem;
}

.row{
margin:30px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  html{
    font-size:55%;
  }
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  .container {

  height:100vh;
}
.row{
margin:0px;
}
.title-home button{
    height:50%;
    width: 20%;
}
}
</style>
</head>
<body>

<div class="title">
  <p>
  INSERT PRODUCTS
  </p>
</div>

<div class="title-home">
 <button><a href="dashboard.php">go back</a></button>
</div>

<div class="container">
  <form action="insertproduct.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="productname">product title:</label>
      </div>
      <div class="col-75">
        <input type="text" id="productname" name="productname" placeholder="enter product title..">
      </div>
    </div>

    
    <div class="row">
      <div class="col-25">
        <label for="category">category:</label>
      </div>
      <div class="col-75">
        <select id="category" name="category">


        <?php

$get_cats = "select * from categories";

$run_cats = mysqli_query($conn,$get_cats);

while ($row_cats = mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_ID'];
    $cat_title = $row_cats['cat_title'];

    echo "<option value='$cat_id'>$cat_title</option>";

   

  }

    ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="imagename1">enter image 1:</label>
      </div>
      <div class="col-75">
        <input type="file" id="imagename1" name="image1" >
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="price">product price:</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" placeholder="enter price..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="desc">product description:</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="productdesc" placeholder="description.." style="height:200px"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="product keyword">product keyword:</label>
      </div>
      <div class="col-75">
        <input type="text" id="productkeyword" name="productkeyword" placeholder="enter product keyword..">
      </div>
    </div>

    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>

  </form>
</div>

</body>
</html>


<?php
    
    if(isset($_POST['submit'])){

      $product_title = $_POST['productname'];
      $product_category = $_POST['category'];
      $product_price = $_POST['price'];
      $product_productdesc = $_POST['productdesc'];
      $status='on';
      $product_productkeyword = $_POST['productkeyword'];



// image 1 validation 

      $product_img1 = $_FILES['image1']['name'];
      $temp_img1name = $_FILES['image1']['tmp_name'];



    move_uploaded_file( $temp_img1name,"product_images/$product_img1");

    

    $insert="INSERT INTO `products` ( `cat_ID`, `date`, `product_title`, `product_img1`,  `product_price`, `product_desc`, `product_status`, `keyword`) VALUES ('$product_category', current_timestamp(), '$product_title', '$product_img1',' $product_price', '$product_productdesc', '  $status' , '$product_productkeyword ') ";


$query=mysqli_query($conn,$insert);


      
    }

?>