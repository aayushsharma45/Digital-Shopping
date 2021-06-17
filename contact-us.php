<?php

require('Database/DBController.php');


if(isset($_POST['submit_contact'])){
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name'];
   $email=$_POST['email'];
   $mobile=$_POST['mobile'];
   $message=$_POST['message'];
   $reg="insert into contatct_us(first_name,last_name,email,mobile,message) values ('$first_name','$last_name','$email','$mobile','$message')";
   $base_url = "http://localhost/finalyear/email_verification.php";
   $mail_body = "
   <h2>Hi ".$first_name.",</h2>
   <p>Thanks for your Query. We will get back you soon! 
   <p>Best Regards <br> UrbanBasket </p>
   ";

   include('smtp/PHPMailerAutoload.php');

   $mail = new PHPMailer(true);

   $mail->IsSMTP();

   $mail->Host = 'smtp.gmail.com';

   $mail->Port = 587;

   $mail->SMTPAuth = true;

   $mail->Username = 'kratostz90@gmail.com';

   $mail->Password = 'qWerty@1';

   $mail->SMTPSecure = 'tls';

   $mail->From = 'kratostz90@gmail.com';

   $mail->FromName = 'UrbanBasket';

   $mail->AddAddress($email,$first_name);

   $mail->IsHTML(true);

   $mail->Subject = 'Your Query has been Registered';

   $mail->Body = $mail_body;

       $mail->SMTPOptions=array('ssl'=>array(
           'verify_peer'=>false,
           'verify_peer_name'=>false,
           'allow_self_signed'=>false,
       ));
       if($mail->send()){
           echo "Done";
       }
   mysqli_query($con,$reg);
}

?>



<?php
include ('header.php');
?>

<?php
include ('Templates/_contact-us.php');
?>

<?php
include ('footer-column.php');
?>



<?php
include ('footer.php');
?>



