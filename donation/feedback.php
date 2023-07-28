
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback | Blood and Organ Donation System</title>
 
    <script src="js/jquery.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
   body {
    background-image: url("static/images/hype31.jpg");
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
.container li a{
  background-color:black;
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
  </div>
</nav>
<div class="container">
<ul class="nav nav-tabs">
  <!-- <li role="presentation" class="active"><a href="feedback.php">Home</a></li> -->
  <li role="presentation"><a href="viewdoctors.php">View Doctors</a></li>
  <li role="presentation"><a href="alldonorprofile.php"> View Donors</a></li>
  <li role="presentation"><a href="viewdeath.php"> View Death Reports</a></li>
  <li role="presentation"><a href="feedback.php"> View Feedback</a></li>
  <!-- <li role="presentation"><a href="regdonor.php"> Add donors</a></li> -->
</ul>
</div>
<h2 align='center'>Feedbacks</h2>
<div class="col-xs-12 col-sm-6 col-md-4">
    <button class="btn btn-danger" id="delete">Delete</button> 
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12" id="res"></div>
<?php

require('db.php');
//include('auth2.php');
//include("auth.php"); //include auth.php file on all secure pages 
// Create connection
$conn = new mysqli("localhost", "root", "" , "project_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo $uname=$_SESSION['uname'];
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);
if ($count=mysqli_num_rows($result) > 0) {
  echo "<table border=0 width='100%' cellspacing=0 col=20>\n";
                    echo " <tr bgcolor='grey' align=center class=\"heading\" >\n";
                    echo "  <td width=70px></td>\n";
                    echo "  <td width=70px></td>\n";
                    echo "  <td>Full Names</td>\n";
                    echo "  <td>Phone</td>\n";
                    echo "  <td>Email</td>\n";
                    echo "  <td>Message</td>\n";
                    echo " </tr>\n";
        $i=0;
        while($row = mysqli_fetch_assoc($result)) {
          $i;$i<=$count;$i++;
         echo " <tr align=center bgcolor='silver' >\n";

                        echo "  <td><input type='checkbox' id='check' name='id' value=".$row['id']."></td>\n";
                        echo "  <td contenteditable='true'>" . $i ."</td>\n";
                        echo "  <td>" . $row["fname"] ."</td>\n";
                        echo "  <td>" . $row["phone"] ."</td>\n";
                        echo "  <td>" . $row["email"] ."</td>\n";
                        echo "  <td>" . $row["msg"] ."</td>\n";
                        echo "  </tr>\n";

    
}
 echo "</table>";
}else {
    echo "0 results";
}

mysqli_close($conn);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
  function delcomments()
  {
     var data = document.getElementById('check');
          var checked = [];
          $.each($("input[name='id']:checked"),function(){
            checked.push($(this).val());
          });
          var id_ary = checked.join(" ");
          $.ajax({
            url:"delcomment.php",
            method:"POST",
            dataType:"html",
            data:{id_ary:id_ary},
            cache:false
          }).done(function(data){
           $("#res").html(data);
          });
  }
  function reload()
  {
    window.location.reload();
  }
  $(document).ready(function(){
        $("#delete").click(function(e){
          e.preventDefault();
          $("#res").html('<div class="alert alert-info">Processing...</div>');
          var data = document.getElementById('check');
          var checked = [];
          $.each($("input[name='id']:checked"),function(){
            checked.push($(this).val());
          });
          var id_ary = checked.join(" ");
          if(!id_ary)
          {
            $("#res").html('<div class="alert alert-warning">Nothing has been selected.</div>');
          }
          else
          {
            $("#res").html('<div class="alert alert-info">Are you sure?&nbsp;<button class="btn btn-danger" onclick="delcomments()">Yes</button>&nbsp;<button class="btn btn-success" onclick="reload()">No</button>  </div>');
          }
        });
  });
</script>

</body>
</html>
