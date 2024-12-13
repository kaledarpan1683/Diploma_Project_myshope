<?php

session_start();
include('includes/db.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
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
  /* height:94vh; */
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
/* ****************************************************************************8 */



table {
  margin:auto;
  margin-top:30px;
  border-collapse: collapse;
  border-spacing: 0;
  width: 50%;
  border: 1px solid #ddd;
  font-size:20px;
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

.conatiner{
        margin:50px
      }


/* ****************************************************************************************************** */


</style>
</head>
<body>

<div class="title">
  <p>
  INSERT CATEGORYS
  </p>
</div>

<div class="title-home">
 <button><a href="dashboard.php">go back</a></button>
</div>

<div class="container">
  <form action="viewcategory.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="productname">Enter New Category:</label>
      </div>
      <div class="col-75">
        <input type="text" id="productname" name="category" placeholder="enter category..">
      </div>
    </div>


    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>

  </form>
</div>

<?php
    
    if(isset($_POST['submit'])){

      
      $product_category = $_POST['category'];


    $insert="INSERT INTO `categories` (  `cat_title` ) VALUES ('$product_category') ";


$query=mysqli_query($conn,$insert);


      
    }

?>

<!-- *************************************************************************************************** -->
<div class="conatiner">

<table id="example" class="display" style="width:100%;background-color:grey">
        <thead>
            <tr>
                <th>Category</th>
                <th>delete</th>
                
            </tr>
        </thead>
        <tbody>

        <?php

$selectcate="SELECT * from categories";

$runselectcat=mysqli_query($conn,$selectcate);

while($fetchcategorys=mysqli_fetch_array($runselectcat)){
  $cate_id=$fetchcategorys['cat_ID'];
  $cate_title=$fetchcategorys['cat_title'];
?>


            <tr align=center>
                <td><?php echo $cate_title ; ?></td>
                <td><a href="viewcategory.php?cat_id=<?php echo $cate_id ; ?>" style="color:black;"><i class="fa-solid fa-trash"></i></a></td>
                
            </tr>
<?php } ?>

            
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

    <?php

if(isset($_GET['cat_id'])){

  $categ_id=$_GET['cat_id'];

  $rundel="DELETE FROM `categories` WHERE cat_ID='$categ_id'";

  $run_catg=mysqli_query($conn,$rundel);
}

    ?>
</div>
</body>
</html>


