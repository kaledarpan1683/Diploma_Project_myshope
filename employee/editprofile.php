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

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
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

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<div class="title">
  <p>
  EDIT PROFILE
  </p>
</div>

<div class="title-home">
 <button><a href="dashbord.php">go back</a></button>
</div>


<div class="container">

<?php

$dfg="SELECT * from employee ";
$xc=mysqli_query($conn,$dfg);

while($jl=mysqli_fetch_array($xc)){
    $csss=$jl['employee_id'];
    $css=$jl['employee_name'];
    $csse=$jl['employee_email'];
    $cssp=$jl['employee_pass'];
}

?>
  <form action="editprofile.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" placeholder="<?php echo $css ; ?>">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="lname">email</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" placeholder="<?php echo $csse; ?>">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">password</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="password" placeholder="Enter new password..">
      </div>
    </div>
    
    
    <div class="row">
      <input type="submit" name="update" value="Submit">
    </div>
  </form>

  <?php

if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$ffed="UPDATE `employee` SET `employee_name`='$name',`employee_email`='$email',`employee_pass`='$password' WHERE employee_id='$csss'";
$result=mysqli_query($conn,$ffed);

}

?>
</div>

</body>
</html>
