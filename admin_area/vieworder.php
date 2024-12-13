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
        margin:50px
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


.tiltelite{
    background-color:#b0b435;
    height:40px;
    text-align:center;
    display:flex;
    height:40px;
    align-items:center;
    justify-content:center;
}

    </style>

</head>
<body>

<div class="title">
  <p>
  ORDERS STATUS
  </p>
</div>

<div class="title-home">
 <button><a href="dashboard.php">go back</a></button>
</div>


<div class="tiltelite" >
  <p>
  ORDERS PENDING
  </p>
</div>


<div class=conatiner>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th >customer name</th>
                <th >Product name</th>
                <th >qty</th>
                <th >Product price</th>
                <th >customer address</th>
                <th >customer contact no</th>
                <th >order date</th>
                <th >Status</th>
             
            </tr>
        </thead>
        
        <tbody>



        <?php



$selectp="SELECT * from customer_order ";

$runselectp=mysqli_query($conn,$selectp);

while($rule=mysqli_fetch_array($runselectp)){

    $cust_id=$rule['customer_id'];
    $due_amount=$rule['due_amount'];
    $cust_iinvoice=$rule['invoice_no'];
    $order_date=$rule['order_date'];
    

    $selpending="SELECT * from pending_orders where customer_id='$cust_id'";

    $gun=mysqli_query($conn,$selpending);

    while($gherin=mysqli_fetch_array($gun)){

        $product_id=$gherin['product_id'];
        $qty=$gherin['qty'];
        $status=$gherin['order_status'];

        

            $customerdetails="SELECT * from customer where customer_ip='$cust_id'";

            $runcustomerdetails=mysqli_query($conn,$customerdetails);

            while($shin=mysqli_fetch_array($runcustomerdetails)){
                $username=$shin['customer_name'];
                $contactno=$shin['customer_contact'];
                $ucustomer_address=$shin['customer_address'];

                 $finalpro="SELECT * from products where product_ID='$product_id'";

        $hatt=mysqli_query($conn,$finalpro);

        while($getout=mysqli_fetch_array($hatt)){

            $pro_name=$getout['product_title'];


                ?>
            <tr>
                <td ><?php echo $username  ; ?></td>
                <td ><?php echo $pro_name ; ?></td>
                <td ><?php echo $qty ; ?></td>
                <td ><?php echo $due_amount ; ?></td>
                <td ><?php echo $ucustomer_address; ?></td>
                <td ><?php echo $contactno ; ?></td>
                <td ><?php echo $order_date ; ?></td>
                <td ><?php echo $status ; ?></td>
            </tr>

            
            <?php
    
            $ronit=(explode(" ",$order_date));

            $ddddd=(explode("-", $ronit[0]));
            $ddddd1=(explode(":", $ronit[1]));

            $time1=$ddddd1[0];
            $time2=$ddddd1[1];
            $time3=$ddddd1[2];

        $date1=$ddddd[0];
        $date2=$ddddd[1];
        $date3=$ddddd[2];
        $rr=$date3+2;
        
        $dd=("$date1/$date2/$rr $time1:$time2:$time3");
        

$iserinemp="INSERT INTO `emp_task`( `customer_name`, `product-name`, `qty`, `amount`, `customer_address`, `customerno`, `delivery_date`, `status`, `customer_ip`, `pro_id`) 
VALUES ('$username ','$pro_name','$qty','$due_amount ','$ucustomer_address','$contactno ','$dd' , '$status', '$cust_id', '$product_id' )";
        
$inserinexp=mysqli_query($conn,$iserinemp) ;       
        
        }}}} ?>
   
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</div>
</body>
</html>