<?php

session_start();
include('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding jQuery cdn-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Adding datatabel cdn-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Adding css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script>
        $(document).ready(function() {
       $('#example').DataTable();
       } );
    </script>


  <style>

      *{
          box-sizing:border-box;
          margin:0;
          padding:0;
      }
      .conatiner{
        margin:20px;
      }

      .display{
          background-color:lightgrey;
          width: 100vw;
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

  </style>
</head>
<body>
    
<div class="title">
  <p>
  PRODUCTS
  </p>
</div>

<div class="title-home">
 <button><a href="dashboard.php">go back</a></button>
</div>




<div class="conatiner">

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>image</th>
                <th>price</th>
                <th>description</th>
                <th>date and time</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>

        <?php

$product_details="SELECT * from products  ";

$run_product_details=mysqli_query($conn,$product_details);

while($fetch_product=mysqli_fetch_array($run_product_details)){

$product_id=$fetch_product['product_ID'];
$product_name=$fetch_product['product_title'];
$product_img1=$fetch_product['product_img1'];
$product_desc=$fetch_product['product_desc'];
$product_keyword=$fetch_product['keyword'];
$product_date=$fetch_product['date'];
$product_price=$fetch_product['product_price'];
?>
            <tr align=center>
                <td><?php echo  $product_name ; ?></td>
                <td><img src="../admin_area/product_images/<?php echo  $product_img1 ; ?>" alt="<?php echo  $product_name ; ?>" width=100></td>
                <td><?php echo  $product_price ; ?></td>
                <td style="width:50%;"><?php echo  $product_desc ; ?></td>
                <td><?php echo  $product_date ; ?></td>
                <td><a href="viewproduct.php?pro_id=<?php echo $product_id ; ?>" style="color:black;"><i class="fa-solid fa-trash"></i></a></td>
            </tr>

 <?php
}


if(isset($_GET['pro_id'])){
    $pro_ids=$_GET['pro_id'];

    $rundel="DELETE FROM `products` WHERE product_ID='$pro_ids' ";
    $result_run=mysqli_query($conn,$rundel);
}

?>

            
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
    </div>
    </body>
</html>