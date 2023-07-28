<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Registration | Blood and Organ Donation System</title>
 
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
    body {
    background-image: url("static/images/hype27.jpg");
    background-repeat: no-repeat;
  background-size: 100vw 110vh;
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
.navbar-brand img{
  padding: 0;
  display: inline;
}


   </style>
  
    
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header page-scroll">
    
                <a class="navbar-brand" href="index.html"><img src="static/images/logo.png" alt="" height="30px">
                Blood and Organ Donation Portal </a>
                    
                           </div>
    <!--<div class="navbar-header">
      <img src="static/images/img3.jpg" height="60%" width="10%"  align="center"><a class="navbar-brand">Tumaini Blood and Organ donation portal</a>
    </div>-->
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
      <li><a href="doclogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
  </div>
</nav>
<div class="container">
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="registration.php">Home</a></li>
  <li role="presentation"><a href="viewdoctors.php">View Doctors</a></li>
  <li role="presentation"><a href="alldonorprofile.php"> View Donors</a></li>
  <li role="presentation"><a href="viewdeath.php"> View Death Reports</a></li>
  <!-- <li role="presentation"><a href="feedback.php"> View Feedback</a></li> -->
  <li role="presentation"><a href="regdonor.php"> Add donors</a></li>
</ul>
</div>

<?php
	
 require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
    $name = stripslashes($_REQUEST['name']); // removes backslashes
    $name = mysqli_real_escape_string($con,$name); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $docid = stripslashes($_REQUEST['docid']); // removes backslashes
    $docid = stripslashes($_REQUEST['docid']);
		$hostype = stripslashes($_REQUEST['hostype']);
		$hostype = mysqli_real_escape_string($con,$hostype);
		$hospital = stripslashes($_REQUEST['hospital']);
		$hospital = mysqli_real_escape_string($con,$hospital);
		$county = stripslashes($_REQUEST['county']);
		$county = mysqli_real_escape_string($con,$county);

        $query = "INSERT into `doc_register` (username, password, name, email, docid, hostype, hospital, county) VALUES ('$username', '$password', '$name', '$email', '$docid','$hostype', '$hospital', '$county')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<script type='text/javascript'>alert('You have submitted your details successfully!!'); document.location.href = 'registration.php';</script>";
        }
    }else{
    }
?>
 <div class="container" style="width: 50%">
 <div class="jumbotron" style="height: 50%">
 <div class="row col s6 m6 card-panel card-content">
<h1>Register Doctors</h1>
<form name="registration" action="" method="post">
<label><h6><B>Login Info</B></h6></label>
<div class="container">
<div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" class="form-control" name="username" required>
</div>
<div class="form-group">
  <label for="password">Password:</label>
  <input type="password" class="form-control" id="usr" name="password" required >
</div>
</div>
<label><h6><B>Basic info</B></h6></label>
<div class="container">
<div class="form-group">
  <label for="fname">Full Name:</label>
  <input type="text" class="form-control" name="name" required>
</div>
<div class="form-group">
  <label for="email">Email:</label>
  <input type="email" class="form-control" name="email" required>
</div>
<div class="form-group">
  <label for="email">Doctor ID:</label>
  <input type="text" class="form-control" name="docid" required>
</div>
 <label>Type of Hospital</label>
 <div class="radio">
  <label><input type="radio" name="hostype" value="public" checked>Public</label>
</div>
   <div class="radio">
  <label><input type="radio" name="hostype" value="private">Private</label>
</div>
<div class="form-group">
  <label for="hospital">Name of Hospital:</label>
  <input type="text" class="form-control" name="hospital" required>
</div>
 <div class="form-group">
  <label for="county">City:</label>
  <input type="text" class="form-control" name="county" required>
  <!-- <select class="form-control" name="county">
    <option value="Nairobi">Nairobi</option>
            <option value="Kisumu">Kisumu</option>
            <option value="Nyeri">Nyeri</option>
            <option value="Nakuru">Nakuru</option>
            <option value="Kericho">Kericho</option>
            <option value="Kisii">Kisii</option>
            <option value="Mombasa">Mombasa</option>
            <option value="Narok">Narok</option>
            <option value="Laikipia">Laikipia</option>
            <option value="Marsabit">Marsabit</option>
            <option value="Turkana">Turkana</option>
  </select> -->
</div>
    
           
           <button type="submit" class="btn btn-primary" name="action">Register</button>
           <button type="reset" class="btn btn-primary" name="cancel">Cancel</button>
        
</form>
</div>
</div> 
</div>
<!--<div class="container">
 
      <div class="row col s12 m6 card-panel card-content">
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post"><br>

<label><h6><B>Login Info</B></h6></label>
<div class="container">
<label for="inputName">Username</label>
<input type="text" name="username" placeholder="Username" required />
<label for="inputPassword">Password</label>
<input type="password" name="password" placeholder="Password" required />
</div>
<input type="text" name="name" placeholder="Name" required /><br>
<input type="Email" name="email" placeholder="Email" required /><br>
<input type="text" name="docid" placeholder="Doctor ID" required /><br>
<input type="text" name="hostype" placeholder="Hospital type" required /><br>
<label>Hospital Type</label>
<p>
      <input name="hostype" type="radio" id="test1" value="public" checked/>
      <label for="test1">Public</label>
    </p>
    <p>
      <input name="hostype" type="radio" id="test2" value="private"/>
      <label for="test2">Private</label>
    </p>
<input type="text" name="hospital" placeholder="Hospital" required /><br>
<input type="text" name="county" placeholder="County" required />
<button class="btn waves-effect waves-light" type="submit" name="action">Register</button>
</form>
</div>
</div>
</div>-->
<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
   
