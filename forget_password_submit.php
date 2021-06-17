<?php
session_start();
require('Database/DBController.php');
require('functions.php');
 


$email=get_safe_value($con,$_POST['email']);
$res=mysqli_query($con,"select * admin_users where email='$email'");
$check_user=mysqli_num_rows($res);

if($check_user>0){
    $row=mysqli_fetch_assoc($res);
    $password=$row['password'];
    $html="Your password is $password";
    include('smtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="kratostz90@gmail.com";
    $mail->Password="qWerty@1";
    $mail->SetFrom("kratostz90@gmail.com");
    $mail->addAddress("$email");
    $mail->IsHTML(true);
    $mail->Subject="New OTP";
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false,
    ));
    if($mail->send()){
        echo "Please check your email id for rpassword";
    }else{
        // echo "Error Occur";
    }
}else{
    echo "Email id not registered with us";
    die();
}


?>