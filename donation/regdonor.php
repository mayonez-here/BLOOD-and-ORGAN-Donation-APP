
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Blood and Organ Donation System</title>
 
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/datepicker.css" rel="stylesheet">
    <style type="text/css">
     body {
    background-image: url("static/images/hype24.jpg");
    background-repeat: repeat;
  background-size: 50vw 110vh;
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
      <li><a href="donorlogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
  </div>
</nav>

<?php
    require('db.php');
    //include("auth2.php");
    // If form submitted, insert values into the database.
if (isset($_POST['action'])){
    
            $uname = stripslashes($_REQUEST['uname']); // removes backslashes
            $uname = mysqli_real_escape_string($con,$uname); //escapes special characters in a string
            $pwd = stripslashes($_REQUEST['pwd']);
            $pwd = mysqli_real_escape_string($con,$pwd);
            $fname = stripslashes($_REQUEST['fname']); // removes backslashes
            $fname = mysqli_real_escape_string($con,$fname); //escapes special characters in a string
            $lname = stripslashes($_REQUEST['lname']);
            $lname = mysqli_real_escape_string($con,$lname);
            $id_num = stripslashes($_REQUEST['id_num']);
            $id_num = mysqli_real_escape_string($con,$id_num);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con,$email);
            $gender = stripslashes($_REQUEST['gender']);
            $gender = mysqli_real_escape_string($con,$gender);
            // $bday = stripslashes($_REQUEST['bday']);
            $bday =stripslashes($_REQUEST['bday']);
           //echo $bday = date("Y-m-d");
          $bday = mysqli_real_escape_string($con,$bday);

          $bday=date_create($bday);

          $bday=date_format($bday,'Y-m-d');
          // echo $bday;
          $age=date_diff(date_create($bday), date_create('today'))->y;

            $weight = stripslashes($_REQUEST['weight']);
            $weight = mysqli_real_escape_string($con,$weight);
            $county = stripslashes($_REQUEST['county']);
            $county = mysqli_real_escape_string($con,$county);
            $phone = stripslashes($_REQUEST['phone']);
            $phone = mysqli_real_escape_string($con,$phone);



            $address = stripslashes($_REQUEST['address']);
            $address = mysqli_real_escape_string($con,$address);             
           
               if ($age< 16 or $weight<50) {
                echo "<script type='text/javascript'> alert('Registration not successful. You have not met the requirements!!') 
                document.location.href = 'regdonor.php' </script>";
               }
               else{
                  $blk = mysqli_query($con, "SELECT id_num from bloodonor WHERE id_num = '$id_num'");
                            if (mysqli_num_rows($blk) > 0)
                                {
                                    echo "<script type='text/javascript'>alert('$uname id number: $id_num already exists!!')</script>";
                                    die(" $uname id number:$id_num already exists!!!!!");

                                }
                            else  { 
                $query = "INSERT into bloodonor  (uname, pwd, fname, lname, id_num, email, gender, bday, age, weight, county, phone, address) VALUES ('$uname','$pwd','$fname', '$lname', '$id_num', '$email', '$gender', '$bday','$age', '$weight', '$county', '$phone','$address')" ;
                  $result = mysqli_query($con,$query);

                   if($result)
             { 
                echo "<script type='text/javascript'>alert('Registered successfully!!')
                document.location.href = 'donorlogin.php'</script>";
              }
                }
               
              
            }
          
      }


?>
  <div class="container" style="width: 50%">
 <div class="jumbotron" style="height: 50%">
 <div class="row col s6 m6 card-panel card-content">
<h1>Donor Registration</h1>
<p>All fields are required</p>
<form name="visitor" action="" method="post">
<label><h6><B>Login Info</B></h6></label>
<div class="container">
<div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" class="form-control" name="uname" required>
</div>
<div class="form-group">
  <label for="password">Password:</label>
  <input type="password" class="form-control" id="usr" name="pwd" required >
</div>
</div>
<label><h6><B>Basic info</B></h6></label>
<div class="container">
<div class="form-group">
  <label for="fname">First Name:</label>
  <input type="text" class="form-control" name="fname" required>
</div>
<div class="form-group">
  <label for="lname"> Last Name:</label>
  <input type="text" class="form-control" name="lname" required>
</div>
<div class="form-group">
  <label for="id_num"> Id Number:</label>
  <input type="text" class="form-control" name="id_num" required>
</div>
<div class="form-group">
  <label for="email">Email:</label>
  <input type="email" class="form-control" name="email" required>
</div>
 <label>Gender</label>
 <div class="radio">
  <label><input type="radio" name="gender" value="male" checked>Male</label>
</div>
   <div class="radio">
  <label><input type="radio" name="gender" value="female">Female</label>
</div>
    
    <div class="form-group" >
  <label for="date">Date:</label>
  <input type="date" class="form-control" data-provide="datepicker-inline" name="bday" id="bday" required>
</div>
   <div class="form-group">
  <label for="weight">Weight in Kgs:</label>
  <input type="text" class="form-control" name="weight">
</div>
    
    

            </div>
<label><h6><B>Contact information</B></h6></label>
        <div class="container">
        <div class="form-group">
  <label for="county">City:</label>
  <input type="text" class="form-control" name="county" required>
</div>
<div class="form-group">
  <label for="phone">Phone number:</label>
  <input type="text" class="form-control" name="phone" required>
</div>



<div class="form-group">
  <label for="address">Address:</label>
  <input type="text" class="form-control" name="address" required>
</div>
         
          
            </div>
           <div align="center" style="padding: 100px; column-span: 20%;">
           <button type="submit" class="btn btn-primary" name="action">Register</button>
           <button type="reset" class="btn btn-primary" name="cancel">Cancel</button>
           </div>
        
</form>
</div>
</div>
</div>
</div> 
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
   <script type="text/javascript">
            // When the document is ready
            $(document).ready(function(){
      $("#bday").datepicker({
        format: 'dd/mm/yyyy' });
      
     });
        </script>            

</body>
</html>
   
      