<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donor portal | Blood and Organ Donation System</title>
 
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/nav.css" rel="stylesheet">
   <style type="text/css">
   body {
    background-image: url("static/images/hype22.jpg");
    background-color: #cccccc;
    background-repeat: no-repeat;
  background-size: 115vw 100vh;
  /* background-position:fixed; */
  background-attachment:fixed;
}

     .navbar-default {
  background-color: #000000;
  border-color: #000000;
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
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #dc0000;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #fafeff;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #fafeff;
}
.navbar-default .navbar-link {
  color: #fafeff;
}
.navbar-default .navbar-link:hover {
  color: #fefefe;
}

.navbar-brand img{
  padding: 0;
  display: inline;
}
   </style>
  
    
  </head>
<body>
<nav class="navbar navbar-default" style="background-color: #000000">
  <div class="container-fluid">
    <div class="navbar-header" >
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
      
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="regdonor.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
          </ul>
  </div>
</nav>

<?php
  require('db.php');

  session_start();
 

  
    // If form submitted, insert values into the database.
    if (isset($_POST['uname'])){
    
    $uname = stripslashes($_REQUEST['uname']); // removes backslashes
    $uname = mysqli_real_escape_string($con,$uname); //escapes special characters in a string
    $pwd = stripslashes($_REQUEST['pwd']);
    $pwd = mysqli_real_escape_string($con,$pwd);
    
  //Checking is user existing in the database or not
    $query = "SELECT * FROM `bloodonor` WHERE uname='$uname' and pwd='$pwd'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
          $row = mysqli_fetch_array($result);
          $id=$row['id'];
          $uname=$row['uname'];
      $_SESSION['uname'] = $uname;
      $_SESSION['id'] = $id;
 
      /*$data=mysqli_fetch_assoc($result);
     $id=$data['id'];
     

      $sqlquery="SELECT * FROM submit_details WHERE sub_id= '$id'";
      $res= mysqli_query($con,$sqlquery) or die(mysqli_error());
      $numrows = mysqli_num_rows($res);

    
        if($numrows==1){ header("Location:donorprofile.php"); }// Redirect user to index.php*/
          
             header("Location:submitdonation.php"); //
          } 
            else{
                 echo "<script type='text/javascript'>alert('Incorrect username or password. Try again!!'); document.location.href = 'donorlogin.php';</script>";
    }
  }
?>



<!--<a href='adminlogin.php'> <input name="submit" type="submit" value="Admin login" /></a></p>-->


<div class="container" style="width: 40%">
<div class="jumbotron" style="height: 50%">
<h1>Donor Log-in</h1>
 <form   class="form-horizontal" action="" name="login" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="uname" aria-describedby="emailHelp" placeholder="Enter Username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pwd" placeholder="Password">
    <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="action">Login</button>
      
    </div>
  </div>
</form>
<p>New to the system?
       <a href="regdonor.php" button type="button" class="btn btn-link">Register</button></p>
       
       
   
  </div></div>
 
<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
           

</body>
</html>