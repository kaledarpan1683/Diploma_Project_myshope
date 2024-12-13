<?php

session_start();
include('includes/db.php');
include('functions/functions.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
<style>
* {
  box-sizing: border-box;
  margin:0;
  padding:0;

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

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  height:80vh;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.row{
margin:30px;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  .row{
margin:0px;
}
.title-home button{
    height:50%;
    width: 20%;
}
}

/* ****************************************************************** */

.container{

    display:flex;
    justify-content:center;
    align-items:center;
    background-color:white;
    

}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 50%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 16px;
}

th:first-child, td:first-child {
  text-align: left;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}

.fa-check {
  color: green;
}

.fa-remove {
  color: red;
}
</style>

</head>
<body>

<div class="title">
  <p>
  YOUR ORDERS
  </p>
</div>
<div class="title-home">
 <button><a href="my-account.php">go back</a></button>
</div>

<div class="container">

<table>
  <tr>
    <th >product name</th>
    <th>product img</th>
    <th>delivery date</th>
    <th>status</th>
  </tr>
  <tr>

  <?php

  $ipaddre=getIPAddress();

$orders="SELECT * from emp_task where customer_ip='$ipaddre'";
$runorders=mysqli_query($conn,$orders);

while($nn=mysqli_fetch_array($runorders)){

    $pro_id=$nn['pro_id'];
    $pro_name=$nn['product-name'];
    $status=$nn['status'];
    $delivery_date=$nn['delivery_date'];

    $ffc=explode(" ", $delivery_date);

$porh="SELECT * from products where product_ID='$pro_id'";

$ds=mysqli_query($conn,$porh);

while($gy=mysqli_fetch_array($ds)){

$pro_img=$gy['product_img1'];
    

?><?php }} ?>
    <td><?php echo $pro_name ; ?></td>
    <td><img src="../admin_area/product_images/<?php echo $pro_img ; ?>" alt="" style="height:100px;width:100px;"></td>
    <td><?php echo $ffc[0]; ?></td>
    <td><?php echo  $status ; ?></td>
  </tr>

</table>

</div>




  

</body>
</html>
