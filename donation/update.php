
<?php

session_start();
if(!isset($_SESSION["username"])){
header("Location: adminlogin.php");
exit(); }
?>
<?php require('db.php');
       ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Blood and Organ Donation System</title>
 
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
   body {
    background-image: url("static/images/1.jpg");
    background-repeat: no-repeat;
    background-color: #cccccc;
    background-attachment: fixed;
    
}
     .navbar-default {
  background-color: #dc0303;
  border-color: #dc0000;
}
.navbar-default .navbar-brand {
  color: #fafeff;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #fefefe;
}
.navbar-default .navbar-text {
  color: #fafeff;
}
.navbar-default .navbar-nav > li > a {
  color: #fafeff;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #fefefe;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #fefefe;
  background-color: #dc0000;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #fefefe;
  background-color: #dc0000;
}
.navbar-default .navbar-toggle {
  border-color: #dc0000;
}

.navbar-brand img{
  padding: 0;
  display: inline;
}

   </style>
  
    
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><img src="static/images/logo.png" alt="" height="30px"> Blood and Organ Donation Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
      <li><a href="donorlogin.php">Donor Portal</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff Portal
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="doclogin.php">Doctor Portal</a></li>
          <li><a href="adminlogin.php">Admin</a></li>
       
        </ul>
      </li>
      
      <li><a href="#"></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li role="presentation"><a href="logout.php">Log out</a></li>
          </ul>
  </div>
</nav>
<div class="container">

<?php 

if(isset($_GET['id']))
{
	 $id=$_GET['id'];

	$sql="SELECT * FROM doc_register WHERE id=$id";
	$result=mysqli_query($con,$sql);

	$row=mysqli_fetch_assoc($result);



}


?>


<div style="float: left;width:25%;height: 50%;">
<form   class="form-horizontal" action="#" method="post">
  <div class="form-group">
    <label for="username">Full Name</label>
    <input type="text" class="form-control" name="name"  aria-describedby="emailHelp" placeholder="Enter Names" value=<?php echo $row['name'] ?> >
    
  </div>
  <div class="form-group">
    <label for="DOCID">Doctor ID</label>
    <input type="text" class="form-control" name="docid"  aria-describedby="emailHelp" placeholder="Enter Doctor ID" value=<?php echo $row['docid'] ?>>
    
  </div>
  <div class="form-group">
    <label for="username">Email</label>
    <input type="email" class="form-control" name="email"  aria-describedby="emailHelp" placeholder="Enter email" value=<?php echo $row['email'] ?>>
    
  </div>
  <div class="form-group">
    <label for="username">Hospital Type</label>
    <input type="text" class="form-control" name="hostype"   aria-describedby="emailHelp" placeholder="Enter Hospital Type" value=<?php echo $row['hostype'] ?>>
    
  </div>
  <div class="form-group">
    <label for="username">Hospital</label>
    <input type="text" class="form-control" name="hospital" aria-describedby="emailHelp" placeholder="Enter Hospital"  value=<?php echo $row['hospital'] ?> >
    
  </div>
  <div class="form-group">
    <label for="username">City</label>
    <input type="text" class="form-control" name="county"  aria-describedby="emailHelp" placeholder="Enter County" value=<?php echo $row['county'] ?>>
    
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="update" value="Update" class="btn btn-primary">       
    </div>
  </div>
</form>

</div>

<?php
if (isset($_POST['update'])) {

	$name=$_POST['name'];
	$docid=$_POST['docid'];
	$email=$_POST['email'];
	$hostype=$_POST['hostype'];
	$hospital=$_POST['hospital'];
	$county=$_POST['county'];

	$query="UPDATE doc_register SET name='$name',docid='$docid',email='$email',hostype='$hostype',hospital='$hospital',county='$county' WHERE id='$id'";
	$result=mysqli_query($con,$query);
	
	if($result)
	{
		
                //header("location:viewdoctors.php");
                echo "<script type='text/javascript'>alert('Your update was successful!!'); document.location.href = 'viewdoctors.php';</script>";
	}

	
}
?>

  
</div>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

