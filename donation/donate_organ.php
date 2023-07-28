<?php   
session_start();
require 'connect.php';
if (isset($_SESSION['username'])) {
  echo "You are logged in as ".$_SESSION['username']; 
  $user_id= $_SESSION['sess_id']; 

}
else{
   header("location:plogin.php");
   echo "log in first";
}



 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="static/images/logo.png" />
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
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
                    <td><a href="details.php">My Details</a></td>
                    <td><a href="appointment.php">Book appointment</a></td>
                    <td><a href="review_booking.php">View Appointment</a></td>
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
                     <?php
                            
                                $sql = "SELECT  * FROM user WHERE user_id='$user_id' ";
                                $result = mysqli_query($conn, $sql);
                                $array=array();
                           
                          
                         while($row = mysqli_fetch_assoc($result)) {
                                   


                                    $array=$row;               

                                }
                                                    

                                ?>
                                <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%"><label>User ID</label></div> 
                                    <div style="float: left; width: 30%"><?php echo  $array["user_id"]; ?></div>
                                    
                                </div>
                                 <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%"><label>Username</label></div> 
                                    <div style="float: left; width: 30%"><?php echo  $array["username"]; ?></div>
                                    
                                </div>
                                <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%"><label>Phone</label></div> 
                                    <div style="float: left; width: 30%"><?php echo  $array["phone"]; ?></div>
                                    
                                </div>
                                 <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%"><label>Email</label></div> 
                                    <div style="float: left; width: 30%"><?php echo  $array["email"]; ?></div>
                                    
                                </div>
                                <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%"><label>Blood Group</label></div> 
                                    <div style="float: left; width: 30%"><?php echo  $array["blood"]; ?></div>
                                    
                                </div>

                                <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%"><label>Select Organ</label></div> 
                                    <div style="float: left; width: 30%;">
                                    <form method="POST" action="donate_organ.php">
                                        <select name="search_id" style="height: 40px; width: 100%; " id="category" id="styledSelect" class="blueText">
                                                     <option>Heart</option>
                                                       <option>Kidney</option>
                                                       <option>Eye</option>
                                                       <option>Skin</option>
                                                       <option>Intestines</option>
                                                       <option>Pancreas</option>
                                                       <option>Lungs</option>
                                                       <option>Liver</option>

                                                 </select>
                                    
                                
                                <div style="float: left; width: 70%">
                                    <div style="float: left; width: 30%; margin-left: 30%;margin-top:15%;"><input type="submit" name="submit" value="Submit"></div> 
                                    </div>
                                    </div>
                                     </div>

                                    </form>
                                    
                      
            
<?php
    function validateSubmission($user_id,$organ_id,$conn){

    //check if organ is submitted twice by the same user 
    $validate="SELECT * FROM `organ_donations` WHERE user_id=$user_id and organ_id=$organ_id";
     $res=mysqli_query($conn,$validate);

     if (mysqli_num_rows($res)<=0) {
        $validatemessage="true";
     }

    else{
        $validatemessage="false";
    }
        return $validatemessage;

    }

    function getRandomString($length =9) {

        $validCharacters = "123456789355287872343479898";

        $validCharNumber = strlen($validCharacters);

     

        $result = "";

     

        for ($i = 0; $i < $length; $i++) {

            $index = mt_rand(0, $validCharNumber - 1);

            $result .= $validCharacters[$index];

        }

     

        return $result;

    }

     function getOrganID($organ,$conn){

    $sqlquery="SELECT organ_id FROM organs WHERE organ_name='$organ'";
    $output=mysqli_query($conn,$sqlquery);

    $array=mysqli_fetch_assoc($output);

    return $array['organ_id'];

     }



    if (isset($_POST['submit'])) {
        

        $organ=$_POST['search_id'];
        $user_id;
        $donation_id=getRandomString();
        $organ_id=getOrganID($organ,$conn);
         $validatemessage=validateSubmission($user_id,$organ_id,$conn);
             if ($validatemessage =='true') {
                $query="INSERT INTO `organ_donations` (`donation_id`, `user_id`, `organ_id`) VALUES ($donation_id, $user_id, $organ_id);";

                $res=mysqli_query($conn,$query);
         
                    if ($res) {
                        echo "details submitted successfully";
                    }
                    else{
                        echo "An error occured while submitting your details";
                    }
                 
             }
             else{
                echo "Note: You cannot donate the same organ twice";
             }

        
    }





?>

<?php
//cancel donated organ
     

                                    if(isset($_POST['cancel']))
                                    {
                                        $id=$_POST['donation_id'];
                                        $query = "DELETE FROM organ_donations WHERE donation_id='$id'";
                                        if(mysqli_query($conn,$query))
                                        {
                                            echo '<p style="color:green;">Successfully Deleted</p>';
                                        }
                                        else
                                        {
                                           echo '<p style="color:red;">Delete was unsuccessful.</p>'; 
                                        }

                                    }
                                    if (isset($_SESSION['sess_id'])) {
                                       
                                          //$patient_id = $_SESSION['sess_id'];
                                          $user_id= $_SESSION['sess_id']; 

                                         $query = "SELECT *FROM organ_donations WHERE user_id = '$user_id'";
                                         $result = mysqli_query($conn, $query);

                                      if (mysqli_num_rows($result) > 0) {



                                        echo "<table border=1 width='40%' cellspacing=0 >\n";
                                        echo " <tr bgcolor='#cccccc' class=\"heading\">\n";
                                        echo "  <td>Donation id</td>\n";
                                        echo "  <td>User id</td>\n";
                                        echo "  <td>Organ id</td>\n";
                                       
                                        echo " </tr>\n";


                                         // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                           


                                             echo " <tr>\n";
                                            echo "  <td><form action='donate_organ.php' method='post'><input style='border: none;' type='text' name='donation_id' value=".$row['donation_id']."></td>\n";
                                            echo "  <td>" . $row["user_id"] ."</td>\n";
                                            echo "  <td>" . $row["organ_id"] ."</td>\n";
                                            
                                            echo "  <td><input type='submit' name='cancel' value='Cancel'></form></td>\n";
                                            echo "  </tr>\n";

                        }

                        echo "</table>";
                        //$result close();

                    } 

                    mysqli_close($conn);

                                    }
                            ?>  
                            </div>      
<footer>
                <p>All rights reserved</p>
            </footer>
        </div>
    </body>
</html>