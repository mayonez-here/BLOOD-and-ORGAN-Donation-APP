<?php

session_start();
if(!isset($_SESSION["uname"])){
header("Location: donorlogin.php");
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
     .navbar-default {
      background-color: #000000;
  border-color: #000000;
}
body{
  background-image: url("static/images/hype25.jpg");
  background-repeat: no-repeat;
  background-size: 100vw 110vh;
  /* background-position:fixed; */
  background-attachment:fixed;
  /* background-size: 100px; */
  /* background-size: cover; */

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
      
      <!-- <li><a href="#">Page 3</a></li> -->
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



	$sql="SELECT * FROM bloodonor, submit_details WHERE id=$id";
	$result=mysqli_query($con,$sql);

	$row=mysqli_fetch_assoc($result);



}


?>


<div style="float: left;width:25%;height: 50%;">
<form   class="form-horizontal" action="#" method="post">
  <div class="form-group">
    <label for="username">First Name</label>
    <input type="text" class="form-control" name="fname"  aria-describedby="emailHelp" placeholder="Enter First Name" value=<?php echo $row['fname'] ?> ></div>
    <div class="form-group">
    <label for="username">Last Name</label>
    <input type="text" class="form-control" name="lname"  aria-describedby="emailHelp" placeholder="Enter  Last Name" value=<?php echo $row['lname'] ?> >
  </div>
  <div class="form-group">
    <label for="username">Email</label>
    <input type="email" class="form-control" name="email"  aria-describedby="emailHelp" placeholder="Enter email" value=<?php echo $row['email'] ?>>
    
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <input type="text" class="form-control" name="gender"   aria-describedby="emailHelp" placeholder="Enter Gender" value=<?php echo $row['gender'] ?>>
    
  </div>
  <div class="form-group">
    <label for="username">Date of birth</label>
    <input type="text" class="form-control" name="bday" aria-describedby="emailHelp" placeholder="Enter Date of Birth"  value=<?php echo $row['bday'] ?> >
    
  </div>
  <div class="form-group">
    <label for="username">Weight</label>
    <input type="text" class="form-control" name="weight" aria-describedby="emailHelp" placeholder="Enter Weight"  value=<?php echo $row['weight'] ?> >
    
  </div>
  <div class="form-group">
    <label for="username">County</label>
    <input type="text" class="form-control" name="county"  aria-describedby="emailHelp" placeholder="Enter County" value=<?php echo $row['county'] ?>>
    
  </div>
  <div class="form-group">
    <label for="username">Postal Address</label>
    <input type="text" class="form-control" name="postal"  aria-describedby="emailHelp" placeholder="Enter Postal Address" value=<?php echo $row['postal'] ?>>
    
  </div>
  <div class="form-group">
    <label for="username">Address</label>
    <input type="text" class="form-control" name="address"  aria-describedby="emailHelp" placeholder="Enter Address" value=<?php echo $row['address'] ?>>
    
  </div>
  <div class="form-group">
  <label for="username">Type of Donation</label>
    <!-- <select name="dtype">
      <option value="Blood">Blood</option>
      <option value="Organ">Organ</option>
    </select> -->

    <p>
      <input name="dtype" type="radio" id="test1" value="Blood" />
      <label for="test1">Blood</label>
      
    </p>
    <p>
      <input name="dtype" type="radio" id="test2" value="Organ"/>
      <label for="test2">Organ</label>
      <select name="organ" class="form-control" id="organ">
        <option value="Eyes">Eyes</option>
        <option value="Heart">Heart</option>
        <option value="Kidney">Kidney</option>
        <option value="Lungs">Lungs</option>
        <option value="Liver">Liver</option>  
        <option value="Brain">Brain</option>
      </select>
    </p>

  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="push" value="Update" class="btn btn-primary">       
    </div>
  </div>
</form>

</div>

<?php
if (isset($_POST['push'])) {

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
  $gender=$_POST['gender'];
  $bday=$_POST['bday'];
  $bday=date_create($bday);
  $bday=date_format($bday,'Y-m-d');
  $age=date_diff(date_create($bday), date_create('today'))->y;
	$weight=$_POST['weight'];
  $county=$_POST['county'];
	$postal=$_POST['postal'];
	$address=$_POST['address'];
  $dtype=$_POST['dtype'];
 
	$query="UPDATE bloodonor, submit_details SET fname='$fname', lname='$lname', email='$email',gender='$gender',bday='$bday',age='$age',weight='$weight',county='$county',postal='$postal',address='$address',dtype='$dtype' WHERE id='$id' and submit_details.b_id = bloodonor.id";
	$result=mysqli_query($con,$query);
	
	if($result)
	{
		
                //header("location:viewdoctors.php");
                echo "<script type='text/javascript'>alert('Your update was successful!!'); document.location.href = 'donorprofile.php';</script>";
	}

	
}
?>

  
</div>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

