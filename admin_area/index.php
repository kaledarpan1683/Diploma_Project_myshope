<?php

session_start();
include('includes/db.php');
include('functions/functions.php');
?>


<?php

if(isset($_POST['loginbtn']))
{

  $admin_email=$_POST['adminName'];
  $admin_password=$_POST['adminPassword'];

  $seclt_admin="SELECT * from admins WHERE admin_email='$admin_email' and admin_password='$admin_password'";

  $runseclt_admin=mysqli_query($conn, $seclt_admin);

  $row_check=mysqli_num_rows($runseclt_admin);

  if($row_check==1){
    $_SESSION['admin_email']=$admin_email;
    header('location:dashboard.php');
  }
  else{
    echo "<script>alert('your email or password is incorrect')</script>";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login form with JavaScript Validation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<style>
  body {
  background: #f2f2f2;
}
.animate {
  -webkit-transition: all 0.3s linear;
  transition: all 0.3s linear;
}
.text-center {
  text-align: center;
}
.pull-left {
  float: left;
}
.pull-right {
  float: right;
}
.clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}
.clearfix {
  display: inline-block;
}
/* start commented backslash hack \*/
* html .clearfix {
  height: 1%;
}
.clearfix {
  display: block;
}
/* close commented backslash hack */
a {
  color: #00A885;
}
a:hover,
a:focus {
  color: #00755d;
  -webkit-transition: all 0.3s linear;
  transition: all 0.3s linear;
}
.text-primary {
  color: #00A885;
}
input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 1000px white inset !important;
}
.logo h1 {
  color: #00A885;
  margin-bottom: -12px;
}
input[type="checkbox"] {
  width: auto;
}
button {
  cursor: pointer;
  background: #00A885;
  width: 100%;
  border: 0;
  padding: 10px 15px;
  color: #fff;
  font-size: 20px;
  -webkit-transition: 0.3s linear;
  transition: 0.3s linear;
}
span.validate-tooltip {
  background: #D91717;
  width: 100%;
  display: block;
  padding: 5px;
  color: #fff;
  box-sizing: border-box;
  font-size: 14px;
  margin-top: -28px;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  -webkit-animation: tooltipanimation 0.3s 1;
  animation: tooltipanimation 0.3s 1;
}
.input-group {
  position: relative;
  margin-bottom: 20px;
}
.input-group label {
  position: absolute;
  top: 9px;
  left: 10px;
  font-size: 16px;
  color: #cdcdcd;
  font-weight: normal;
  padding: 2px 5px;
  z-index: 5;
  -webkit-transition: all 0.3s linear;
  transition: all 0.3s linear;
}
.input-group input {
  outline: none;
  display: block;
  width: 100%;
  height: 40px;
  position: relative;
  z-index: 3;
  border: 1px solid #d9d9d9;
  padding: 10px 10px;
  background: #ffffff;
  box-sizing: border-box;
  font-wieght: 400;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.input-group .lighting {
  background: #00A885;
  width: 0;
  height: 2px;
  display: inline-block;
  position: absolute;
  top: 40px;
  left: 0;
  -webkit-transition: all 0.3s linear;
  transition: all 0.3s linear;
}
.input-group.focused .lighting {
  width: 100%;
}
.input-group.focused label {
  background: #fff;
  font-size: 12px;
  top: -8px;
  left: 5px;
  color: #00A885;
}
.input-group span.validate-tooltip {
  margin-top: 0;
}
.wrapper {
  width:100vw;
 height: 100vh;
  background: #fff;
  margin: 0 auto;
  min-height: 200px;

  
  border: 1px solid #f3f3f3;
}

.testr{
  display: flex;
   justify-content:center;
  align-items:center;
  height:100vh; 
}
.wrapper .inner-warpper {
  /* position: relative;
  left:750px;
  Top:200px; */
  width: 20%;
  height: 50%;
  padding: 50px 30px 60px;
  box-shadow: 1px 1.732px 10px 0px rgba(0, 0, 0, 0.063);
}
.wrapper .title {
  margin-top: 0;
}
.wrapper .supporter {
  margin-top: 10px;
  font-size: 14px;
  color: #8E8E8E;
  cursor: pointer;
}
.wrapper .remember-me {
  cursor: pointer;
}
.wrapper input[type="checkbox"] {
  float: left;
  margin-right: 5px;
  margin-top: 2px;
  cursor: pointer;
}
.wrapper label[for="rememberMe"] {
  cursor: pointer;
}
.wrapper .signup-wrapper {
  padding: 10px;
  width: 22%;
  font-size: 14px;
  background: #EBEAEA;
}
.wrapper .signup-wrapper a {
  text-decoration: none;
  color: #7F7F7F;
}
.wrapper .signup-wrapper a:hover {
  text-decoration: underline;
}
@-webkit-keyframes tooltipanimation {
  from {
    margin-top: -28px;
  }
  to {
    margin-top: 0;
  }
}
@keyframes tooltipanimation {
  from {
    margin-top: -28px;
  }
  to {
    margin-top: 0;
  }
}
.direction {
  width: 200px;
  position: fixed;
  top: 120px;
  left: 20px;
  font-size: 14px;
  line-height: 1.2;
  text-align: center;
  background: #9365B8;
  padding: 10px;
  color: #fff;
}
@media (max-width: 480px) {
  .direction {
    position: static;
  }
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="logo text-center" style="background-color:white;">
<img src="../images/logo1.png"  alt="" >
</div>

<div class="wrapper">
  <div class="testr">
  <div class="inner-warpper text-center">
    <h2 class="title">Login to your account</h2>

    <br>
    <form action="" method="POST" id="formvalidate">
      <div class="input-group">
       
        <input class="form-control" name="adminName" id="adminName" type="text" placeholder="Enter email" required />
        <span class="lighting"></span>
      </div>
      <div class="input-group">
        
        <input class="form-control" name="adminPassword" id="adminPassword" type="password" placeholder="Enter passsword "required  />
        <span class="lighting"></span>
      </div>
      <br>

      <button type="submit" id="login" name="loginbtn" style="background-color:#b0b435;">Login</button>
      <div class="clearfix supporter">

      
        </div>
        <br>
        <br>
        

    
      </div>

    </form>

   
  </div>
  
</div>



</body>
</html>

