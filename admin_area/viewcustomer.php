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
  CUSTOMERS
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
                <th>Email</th>
                <th>customer state</th>
                <th>customer city</th>
                <th>customer address</th>
                <th>customer contact no</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>

        <?php

$customer_details="SELECT * from customer  ";

$run_customer_details=mysqli_query($conn,$customer_details);

while($fetch_customer=mysqli_fetch_array($run_customer_details)){

$customer_id=$fetch_customer['customer_id'];
$customer_name=$fetch_customer['customer_name'];
$customer_email=$fetch_customer['customer_email'];
$customer_state=$fetch_customer['customer_state'];
$customer_city=$fetch_customer['customer_city'];
$customer_address=$fetch_customer['customer_address'];
$customer_contact=$fetch_customer['customer_contact'];
?>
            <tr align=center>
                <td><?php echo  $customer_name ; ?></td>
                <td><?php echo  $customer_email ; ?></td>
                <td><?php echo  $customer_state ; ?></td>
                <td><?php echo  $customer_city ; ?></td>
                <td><?php echo  $customer_address; ?></td>
                <td><?php echo  $customer_contact ; ?></td>
                <td><a href="viewcustomer.php?customer_id=<?php echo $customer_id ; ?>" style="color:black;"><i class="fa-solid fa-trash"></i></a></td>
            </tr>

 <?php
}


if(isset($_GET['customer_id'])){
    $pro_ids=$_GET['customer_id'];

    $rundel="DELETE FROM `customer` WHERE customer_id='$pro_ids' ";
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