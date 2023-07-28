<?php   
session_start();
require 'connect.php';
if (isset($_SESSION['username'])) {
  echo "You are logged in as ".$_SESSION['username'];  
  $id=$_SESSION['user_id'];
  $username = $_SESSION['username'];
}
else{
   header("location:users_login.php");
   echo "log in first";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Appointment</title>
        <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
 <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="banner"> 
             <center><h1>Efficient Doctor Patient System</h1></center>
                                
            </div>
            
            <nav id="navigation">
                <table style="width:100%" id="nav">
            <tr>
                <!--<ul id="nav">-->
                    <!--<td><a href="index.php">Home</a></td>-->
                    <td><a href="details.php">My Details</a></td>
                     <td><a href="appointment.php">Book appointment</a></td>
                    <td><a href="review_booking.php">View appointment</a></td>
                    <td><a href="search_doctor.php">Search Doctor</a></td>
                    <td><a href="donate_organ.php">Donate Organ</a></td>
                    <td><a href="search_donation.php">Search Organ</a></td>
                    <td><a href="contacts.php">Feedback</a></td>
                    <td><a href="plogout.php">Logout</a></td>
                <!--</ul>-->
                </tr>
                </table>
            </nav>
            
            <div id="content_area">
                <!--<?php echo $content; ?>-->
                <H3>Book appointment</H3>
              <?php
                if(isset($_POST['book']))
                {
                  $doctor =  $_POST['doctor'];
                  $atime =  $_POST['atime'];
                  $adate =  $_POST['date'];
                  $category =  $_POST['category'];
                     $query2 = "SELECT * FROM doctor WHERE name='$doctor'";
                  $find2 = mysqli_query($conn,$query2);
                  $row2 = mysqli_fetch_array($find2);
                  $did = $row2['doctor_id'];
                  $query = "SELECT * FROM appointments WHERE doctor_id='$did' AND appointment_time='$atime' AND appointment_date='$adate'";
                  $find = mysqli_query($conn,$query);
                  $count = mysqli_num_rows($find);
              
                  if($doctor == '' || $atime == '' || $adate == '' || $category == '')
                  {
                    echo '<p style="color:red;">All fields must be filled.</p>';
                  }
                  else
                  {
                    if($count > 0)
                  {
                  echo '<p style="color:red;">Sorry the doctor is not available at that time.</p>'; 
                  }else
                  {
                  $query2 = "INSERT INTO appointments VALUES (NULL, '$id', '$username', '$category', '$did', '$adate', '$atime', NULL)";
                  $ins = mysqli_query($conn,$query2);                    
                    if($ins == true)
                  {
                     echo '<p style="color:green;">Appointment successfully booked.</p>';
                   }else
                   {
                     echo '<p style="color:red;">Sorry something went wrong.</p>';
                   }
                  }
                  }
                }
              ?>
               
                                                 
              <form method="POST" action="appointment.php" id="formpost">
                                 <table><tr><td> 
                                   <div style="float: left; width: 30%"><label>Doctor Category</label></div> </td><td>
                                    <select name="category" style="height: 40px; width: 100%; " id="category" id="styledSelect" class="blueText" required>
                                                        <option id="disable">Select Category*</option>
                                                        <option>Normal</option>
                                                        <option>Bone</option>
                                                        <option>Heart</option>
                                                        <option>Dentist</option>
                                                        <option>Kidney</option>
                                                        <option>Neurologist</option>
                                                        <option>Cardiologist</option>
                                                        <option>Eye</option>
                                                         <option>Physiologist</option>
                                                         <option>Psychiatrist</option>
                                                         <option>Gynocologist</option>

                                                 </select>
                                </td></tr>
                                <tr><td>
                                
                                    <div style="float: left; width: 30%"><label>Date</label></div> </td><td>
                                    <input type="text" id="txtDate" name="date" style="height: 40px; width: 100%;" placeholder="dd-mm-yyyy" id="styledSelect" class="blueText" required>  </td></tr>
                                    <tr><td>  
                                    <div style="float: left; width: 30%"><label>Time</label></div> </td><td>
                                                <select name="atime" style="height: 40px; width: 100%;" id="styledSelect" class="blueText" required>
                                                       <option id="disable2">Select Time*</option>
                                                       <option>0800</option>
                                                       <option>0900</option>
                                                       <option>1000</option>
                                                       <option>1100</option>
                                                       <option>1200</option>
                                                       <option>1300</option>
                                                       <option>1400</option>
                                                       <option>1500</option>
                                                       <option>1600</option>
                                                       <option>1700</option>
                                                       <option>1800</option>
                                                 </select>
                                </td></tr></table>
                                
                                <div style="float: left; width: 70%">
                                <br>
                                    <button id="check" style="height: 30px; width: 40%; border-color: #800080; border-style: none; background-color: #F6CECE; color: purple">Check</button>
                                  </div> 
                                <div style="float: left; width: 70%"; id="res">
                                <br></div> 
                    
                                
                                    
            </div>  
            <br><br><br>


   <!--  <div style="float: left; width: 70%">
    <div style="float: left; "><label>Do you need a parking space?</label></div> 
                                    <select name="selection" style="height: 40px; width: 100%; " id="selection">
                                                        <option>No</option>
                                                        <option>Yes</option>
                                                       

                                                 </select>
                                
                                
                                       <input type="submit" name="submit" value="submit" >
                                
                                
                                
                                                 </div> -->
                                                 </form>

                                                 


            <footer>
                <p>All rights reserved</p>
            </footer>
        </div>

    </body>
    <script type="text/javascript">
    $('#disable').attr('disabled', true);
    $('#disable2').attr('disabled', true);
        $('#check').click(function(e){
           e.preventDefault();
              $('#check').html('Processing....');
              var data = $('#formpost').serialize();
              var category = $('#category').val();
              if(category == "")
              {
                $("#res").html('<div style="float: left; width: 70%"; id="res"><p>Doctor category is required.</p></div> ');
                 $('#check').html('Check');
              }
              else
              {
               $.ajax({
                  url: 'functions/check.php',
                  cache:false,
                  dataType: "html",
                  method: 'post',
                  data: data
               }).done(function(data){
                             $("#res").fadeIn();
                             $("#res").html(data);
                              $('#check').html('Check');
                       });
              }
          });    
     $(document).ready(function(){
      $("#txtDate").datepicker();
     })
    </script>

                            
</html>