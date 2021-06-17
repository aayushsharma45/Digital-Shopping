<?php

include('smtp/PHPMailerAutoload.php');

class Mail {
    public function sendMail($mail_body, $email, $fullname, $subject) {

        $mail = new PHPMailer(true);

        $mail->IsSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->Port = 587;

        $mail->SMTPAuth = true;

        $mail->Username = 'sharma2000aayush@gmail.com';

        $mail->Password = 'Aa#1234';

        $mail->SMTPSecure = 'tls';

        $mail->From = 'sharma2000aayush@gmail.com';

        $mail->FromName = 'UrbanBasket';

        $mail->AddAddress($email,$fullname);

        $mail->IsHTML(true);

        $mail->Subject = $subject;

        $mail->Body = $mail_body;

        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false,
        ));
        if($mail->send()){
            echo "Done";
        }

      
   }
}


?>