
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign In | Blood and Organ Donation System</title>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
    
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="static/images/favicon.png"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="static/css/materialize.min.css"  media="screen,projection"/>
    
  </head>
<body>
<div class="header">
            <nav>
            <div class="nav-wrapper teal">
                <ul class="right hide-on-med-and-down" id="nav-mobile">
                    <li role="presentation" class=""><a href="index.html">Home</a>
                    </li>
                    <li role="presentation"><a href="logout.php">Logout</a>
                    </li>
                    <li role="presentation"><a href="login.php">Sign In</a>
                    </li>
                </ul>
            </div>
            </nav>
        </div>
        <h1>Blood Donors Report</h1>

<?php

require('db.php');
include("auth.php"); //include auth.php file on all secure pages 
// Create connection
$conn = new mysqli("localhost", "root", "" , "project_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, fname, lname, email, gender, bday, county FROM bloodonor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<br><br>" . $row["id"]. " | " . $row["fname"]. "|" . $row["lname"]. " | ".$row["email"]. " | ".$row["gender"]. " | ".$row["bday"] ."| ".$row["county"];
        }

} else {
    echo "0 results";
}

	
?>

</div>
<footer class="page-footer teal">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text"> Details </h5>
              <p class="grey-text text-lighten-4">
                More awesome details about ideabox
              </p>
            </div>
            <div class="col l4 offset-12 s12">
              <h5 class="white-text"> Links </h5>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container"> &copy; Andela Idea Box 2017 </div>
        </div>
      </footer>
<script type="text/javascript" src="static/js/jquery.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="static/js/materialize.min.js"></script>

</body>
</html>