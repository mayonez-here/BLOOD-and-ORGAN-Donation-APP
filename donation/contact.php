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

body{
  background-image: url("static/images/hype12.jpeg");
  background-repeat: no-repeat;
  background-size: 100vw 110vh;
  /* background-position:fixed; */
  background-attachment:fixed;
  /* background-size: 100px; */
  /* background-size: cover; */

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
      

  </div>
</nav>






<!-- Contact Start -->
<div class="container">
<div class="jumbotron">
<h1>Send Us A Message</h1>
 <form class="form-horizontal" action="" name="conact" method="post">
  <div class="form-group">
    <label for="username">Full Names</label>
    <input type="text" class="form-control" name="fname" aria-describedby="emailHelp" placeholder="Your Full Names">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="text" class="form-control" name="phone" placeholder="Phone">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group"> 
     <div class="textarea-message form-groupa">
     <label for="message">Please Enter Your Message</label>
     <textarea name="msg" class="textarea-message form-control" placeholder="Your Message" rows="5"></textarea>
     </div>
     </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="act">Submit</button>
    </div>
  </div>
</form>
  </div>
  </div>
 
      <!--<div class="row col s12 m6 card-panel card-content">
          <h1>Doctor Log-in</h1>
          <form action="" method="post" name="login">
            <br><label for="inputName">Username</label></br>
            <br><input type="text" name="username" id="inputName" class="validate" placeholder="Username" required autofocus></br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="validate" placeholder="Password" required>             
          <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
          </form>-->
                    
              <!--  <h3>Send us a Message</h3>
                <form name="sentMessage"  method="post"  id="contactForm">
                <table>
                <tr><td><label>Full Name</label></td></tr>
                <tr><td><input type="text" name="fname" required></td></tr>
                <tr><td><label>Phone</label></tr>
                <tr><td><input type="text" name="phone" required><br></tr>
                <tr><td><label>Email</label></tr>
                <tr><td><input type="email" name="email" required><br></tr>
                <tr><td><label>Message</label></tr>
                <tr><td><textarea rows="10" cols="100" name="msg" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" required></textarea><br></tr>
                 <tr><td><input type="submit" name="conact" value="send"></tr>
                   </table>
                </form>-->
      
<?php
//session_start();
    require('db.php');
    if(isset($_POST['act'])){
        $fname=$_POST["fname"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $msg=$_POST["msg"];
    
        $query = "INSERT into `contact` (fname, phone, email, msg ) values ('$fname', '$phone', '$email', '$msg')";
        $result=mysqli_query($con,$query);
            if($result) 
            {
            echo "<script type='text/javascript'>alert('Thank You! Your Message has been Sent!!'); document.location.href = 'index.html';</script>";
            } 
            else{ echo "<script type='text/javascript'>alert('Some Error Occured! Try Again!'); document.location.href = 'index.html';</script>";
        }   
    }
?>
       
 <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
