<?php
session_start();
if (!isset($_SESSION['uname'])) {
 header('location:donorlogin.php');
}
 
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submit donation| Blood and Organ Donation System</title>
 
    <script src="js/jquery.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
    body {
    background-image: url("static/images/hype23.jpg");
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

.card-content{
  color:white;
}

#organ
{
  display: none;
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
      <li><a href="donorlogin.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
  </div>
</nav><li class="active"><a href="#"> Logged In As <?php echo $_SESSION['uname']; ?></a></li>

        <?php
    require('db.php');
    //include('auth2.php');
    // If form submitted, insert values into the database.
    
    if (isset($_POST['action'])){

        $dtype = stripslashes($_REQUEST['dtype']); // removes backslashes
        $dtype = mysqli_real_escape_string($con,$dtype); //escapes special characters in a string
        $organ = stripslashes($_REQUEST['organ']);
        $organ = ($_REQUEST['organ']);
        $organ = mysqli_real_escape_string($con,$organ);
        $regdate=date("Y-m-d");
        $uname=$_SESSION['uname'];
        $sub=mysqli_query($con,"SELECT id FROM bloodonor where uname='$uname'");
         if (mysqli_num_rows($sub) > 0)
    {
        while($row = mysqli_fetch_assoc($sub))
         {
            $idd = $row["id"];
          }     
     }
     if($dtype == "Blood"){
      $organ = "NA";
     }
        $query =  mysqli_query($con, "INSERT INTO `submit_details`(dtype,organ,regdate,b_id) values('$dtype','$organ','$regdate','$idd')");
        // SELECT bloodonor.uname,bloodonor.pwd,bloodonor.fname,bloodonor.lname,bloodonor.email,bloodonor.gender,bloodonor.bday,bloodonor.weight,bloodonor.county,bloodonor.phone,bloodonor.postal,bloodonor.address,submit_details.dtype,submit_details.organ,submit_details.mode
//FROM bloodonor,submit_details
//WHERE bloodonor.id=submit_details.sub_id
//ORDER BY bloodonor.id;
        
      
        //$result = mysqli_query($con,$sub);
        if($query){//and $sub){
           echo "<script type='text/javascript'>alert('You have submitted your details successfully!!'); document.location.href = 'donorprofile.php';</script>";
               

        }
    else{ echo "try again";}
}
?>
        <div class="container">
 
      <div class="row col s12 m6 card-panel card-content">
          <h1>Submit Donation</h1>
          <div style="float: left">
          <form action="" method="post">
            <br><label for="inputName">Type of Donation</label></br>
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
        <option value="Bone Marrow">Bone Marrow</option>
        <option value="Liver">Liver</option>  
        <option value="Brain">Brain</option>
      </select>
    </p>
    
    <!--<select name="organ">
      <option value="cornea">cornea</option>
      <option value="kidney">kidney</option>
      <option value="lungs">lungs</option>
      <option value="heart">heart</option>
      </select>-->
  </div>
</div>
 

<!--<select>
  <optgroup label="Swedish Cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
  </optgroup>
  <optgroup label="German Cars">
    <option value="mercedes">Mercedes</option>
    <option value="audi">Audi</option>
  </optgroup>
</select>--><div style="float: left">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </div>
                   </form>
                   </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $("#test2").on('change', function(){
    $("#organ").fadeIn();
   });
  });
</script>
</body>
</html>
   