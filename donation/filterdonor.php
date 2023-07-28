<?php

session_start();
if(!isset($_SESSION["username"])){
header("Location: doclogin.php");
exit(); }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Blood and Organ Donation System</title>
 
    <script src="js/jquery.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
    body {
    background-image: url("static/images/hype17.jpeg");
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
#organ{
  width: 10%;
}

.form-group{
  padding-left: 50px ;
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
          <li><a href="login.php">Doctor Portal</a></li>
          <li><a href="adminlogin.php">Admin</a></li>
       
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
  </div>
</nav>
<li class="active"><b><a href="#"> Logged In As <?php echo $_SESSION['username']; ?></a></b></li>
<div class="container-fluid">
 <form class="form-horizontal" action="" name="docview" method="GET">
<div class="form-group">
<!-- <p>
      <input name="dtype" type="radio" id="test1" value="Blood" />
      <label for="test1">Blood</label>
    </p> -->
    <h2> Search For Organ Donors</h2>
    <p>
      <!-- <input name="dtype" type="radio" id="test2" value="Organ"/> -->
      <h3><label for="test2">Organ</label></h3>
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
  <!-- <select class="form-control" name="county">
  <option>County</option>
     <option value="Nairobi">Nairobi</option>
            <option value="Kisumu">Kisumu</option>
            <option value="Nyeri">Nyeri</option>
            <option value="Kiambu">Kiambu</option>
            <option value="Kajiado">Kajiado</option>
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
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="filter">Submit</button>
    </div>
  </div>

</form></div>

<?php 
require('db.php');
// $type = 'Organ';
 if(isset($_GET['filter']))
    {
        $search= $_GET["organ"];
        $query=mysqli_query($con, "SELECT * FROM bloodonor, submit_details WHERE submit_details.organ='$search' and submit_details.dtype= 'Organ' and bloodonor.id=submit_details.b_id ");
       // echo (' <br><b><h1>'. $query->num_rows. ' Records</b></h2>');
       

 if ($count = mysqli_num_rows($query) > 0){
  



                    echo "<table border=0 width='100%' cellspacing=0 >\n";
                    echo " <tr bgcolor='grey' align=center class=\"heading\" >\n";
                    echo "  <td width=70px></td>\n";
                    echo "  <td width=70px></td>\n";
                    echo "  <td>First Name</td>\n";
                    echo "  <td>Last Name</td>\n";
                    echo "  <td>Id number</td>\n";
                    echo "  <td>Gender</td>\n";
                    echo "  <td>Age</td>\n";
                     echo "  <td>Phone</td>\n";
                     echo "  <td>Email</td>\n";
                    //  echo "  <td>Donation Type</td>\n";
                     echo "  <td>Organ Type</td>\n";
                     echo "  </tr>\n";
                   

$i=0;
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
       //$emailaddresses[]=$row["email"];
$i;$i<=$count;$i++;

                        echo " <tr align=center bgcolor='silver' >\n";
                        //echo "  <td contenteditable='true'>" . $row["id"] ."</td>\n";
                        echo "  <td><input type='checkbox' id='check' name='id' value=".$row['sub_id']."></td>\n";
                         echo "  <td>" . $i."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["fname"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["lname"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["id_num"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["gender"] ."</td>\n";
                        //echo "  <td contenteditable='true'>" . $row["bday"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["age"] ."</td>\n";
                        //echo "  <td contenteditable='true'>" . $row["county"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["phone"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["email"] ."</td>\n";
                        // echo "  <td contenteditable='true'>" . $row["dtype"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["organ"] ."</td>\n";
                        echo "  </tr>\n";

    }
      
    //var_dump($emailaddresses);
   
    echo "</table>";

    //$result close();
} else {
   // echo "0 results";
} 
}
    
?>



</div>


<div class="container-fluid">
 <form class="form-horizontal" action="" name="docview" method="GET">
<div class="form-group">
<!-- <p>
      <input name="dtype" type="radio" id="test1" value="Blood" />
      <label for="test1">Blood</label>
    </p> -->
    <h2> Search For Blood Donors</h2>
    <p>
      <!-- <input name="dtype"  id="test1" value="Blood" checked/> -->
      <h3><label name="dtype" for="test1">Blood</label></h3>
    </p>
  <!-- <select class="form-control" name="county">
  <option>County</option>
     <option value="Nairobi">Nairobi</option>
            <option value="Kisumu">Kisumu</option>
            <option value="Nyeri">Nyeri</option>
            <option value="Kiambu">Kiambu</option>
            <option value="Kajiado">Kajiado</option>
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
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="filter1">Submit</button>
    </div>
  </div>

</form></div>

<?php 
require('db.php');

 if(isset($_GET['filter1']))
    {
        $search1= "Blood";
        $query=mysqli_query($con, "SELECT * FROM bloodonor, submit_details WHERE submit_details.dtype='$search1' and bloodonor.id=submit_details.b_id ");
       // echo (' <br><b><h1>'. $query->num_rows. ' Records</b></h2>');
       

 if ($count = mysqli_num_rows($query) > 0){
 ;



                    echo "<table border=0 width='100%' cellspacing=0 >\n";
                    echo " <tr bgcolor='grey' align=center class=\"heading\" >\n";
                    echo "  <td width=70px></td>\n";
                    echo "  <td width=70px></td>\n";
                    echo "  <td>First Name</td>\n";
                    echo "  <td>Last Name</td>\n";
                    echo "  <td>Id number</td>\n";
                    echo "  <td>Gender</td>\n";
                    echo "  <td>Age</td>\n";
                     echo "  <td>Phone</td>\n";
                     echo "  <td>Email</td>\n";
                     echo "  <td>Donation Type</td>\n";
                    //  echo "  <td>Organ Type</td>\n";
                     echo "  </tr>\n";
                   

$i=0;
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
       //$emailaddresses[]=$row["email"];
$i;$i<=$count;$i++;

                        echo " <tr align=center bgcolor='silver' >\n";
                        //echo "  <td contenteditable='true'>" . $row["id"] ."</td>\n";
                        echo "  <td><input type='checkbox' id='check' name='id' value=".$row['sub_id']."></td>\n";
                         echo "  <td>" . $i."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["fname"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["lname"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["id_num"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["gender"] ."</td>\n";
                        //echo "  <td contenteditable='true'>" . $row["bday"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["age"] ."</td>\n";
                        //echo "  <td contenteditable='true'>" . $row["county"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["phone"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["email"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["dtype"] ."</td>\n";
                        // echo "  <td contenteditable='true'>" . $row["organ"] ."</td>\n";
                        echo "  </tr>\n";

    }
      
    //var_dump($emailaddresses);
   
    echo "</table>";

    //$result close();
} else {
   // echo "0 results";
} 
}
    
?>



</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>