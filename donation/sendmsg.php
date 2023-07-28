<html><body>
 <form name='sendmsg' method='post'>
<div class='form-group'>
    <label for='username'>Message</label>
    <input type='text' class='form-control' name='msg'  aria-describedby='emailHelp' placeholder='Enter Message' >
    
  </div>
  <input type='submit' a class='btn btn-success' name='sub' value='Send Email'/>
</form>
<?php
require('db.php');
if(isset($_POST['sub'])){
$msg=$_POST['msg'];


require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
                              // Enable verbose debug output
//echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; 

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'wanjirajackie8@gmail.com';                 // SMTP username
$mail->Password = 'madrigal';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('wanjirajackie8@gmail.com','Jackie Maina');

//$mail->addAddress('joe@example.net', 'Joe User');  
   // Add a recipient

              // Name is optional
  //$county = stripslashes($_REQUEST['county']);
   // $county = mysqli_real_escape_string($con,$county);

     echo $county=$_GET['county'];
$sq = mysqli_query($con, "SELECT email FROM bloodonor WHERE county='$county'");
 if (mysqli_num_rows($sq) > 0)
    {
        while($row = mysqli_fetch_assoc($sq))
         {
            $emailaddresses[] = $row["email"];
          }     
     }
//$emailaddresses=array();
// echo $emailaddresses[]=$row["email"];
//$emailaddresses['0']='alfredwmaina25@gmail.com';
//$emailaddresses['1']='Jackiemaina8@gmail.com';
foreach ($emailaddresses as $address) {
    $mail->addAddress($address);
}
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');


$mail->addAttachment('$msg');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation of the blood donation dates and venue';
$mail->Body    = $msg;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    }
}
?>
</body>
</html>