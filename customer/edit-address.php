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
</style>
</head>
<body>

<div class="title">
  <p>
  CHANGE ADDRESS
  </p>
</div>
<div class="title-home">
 <button><a href="my-account.php">go back</a></button>
</div>

<div class="container">


<?php

$email_c=$_SESSION['customer_email'];

$change_address="select * from customer where customer_email='$email_c'";

$runquery=mysqli_query($conn,$change_address);

while($fetchaddress=mysqli_fetch_array($runquery)){
    $state=$fetchaddress['customer_state'];
    $city=$fetchaddress['customer_city'];
    $address=$fetchaddress['customer_address'];

}

?>

<?php


if(isset($_POST['submit'])){
$state_f=$_POST['state'];
$city_f=$_POST['city'];
$address_f=$_POST['address'];

$uquery="UPDATE `customer` SET `customer_state`='$state_f',`customer_city`='$city_f',`customer_address`='$address_f' WHERE customer_email='$email_c'";

$run_uquery=mysqli_query($conn,$uquery);


}

?>

  <form action="" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">State</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="state" placeholder="<?php echo $state ; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">City</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="city" placeholder="<?php echo $city ; ?>">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="subject">Address</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="address" placeholder="<?php echo  $address ; ?>" style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="submit" value="UPDATE">
      
    </div>
  </form>



</div>

</body>
</html>
