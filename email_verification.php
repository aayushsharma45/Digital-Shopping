<?php
session_start();
require('Database/DBController.php');


if (isset($_GET["activation_code"])) {

    $activation_code = $_GET["activation_code"];

    $select_query = "SELECT * FROM admin_users WHERE email_verification_token = '$activation_code'";

    $result=mysqli_query($con,$select_query);
    $num=mysqli_num_rows($result);

    if ($num > 0){
        $row = mysqli_fetch_array($result);
        if ($row['is_verified'] == "false") {
					
            $update_query = "UPDATE admin_users SET is_verified = 'true' WHERE user_id = '".$row['user_id']."'";
            $res=mysqli_query($con,$update_query);
            if (isset($res)) {
                $_SESSION['status'] = "Email Address Successfully Verified";
               $_SESSION['status_code'] = "success";
               $_SESSION['status_button'] = "Done";
            }
        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400;500&display=swap');


    *{
        margin: 0;
        padding: 0;
        font-family: 'Baloo Bhai 2', cursive;
        box-sizing: border-box;
     }

     body{
         display: flex;
         justify-content: center;
         align-items: center;
         
         background-size: cover;
         background: linear-gradient(#2b1055, #7597de);
     }

     section{
         position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
      
        padding: 20px;
        width: 100%;
     }

     section img{
         height: 100vh;
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         pointer-events: none;
     }

     

     section .contact-content{
         margin-top: 170px;
        position: relative;
        z-index: 1000;
        width: 100%;
        max-width: 1200px;
        padding:150px;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 45px rgba(0,0,0,0.1);
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        overflow: hidden;
        backdrop-filter: blur(25px);
     }

     section .contact-content h2{
         font-size: 50px;
         color: azure;
         text-align: center;
     }

     section .contact-content .input-field{
        text-align: center;
     }

     section .contact-content .input-field input{
         width: 80%;
         margin-top: 10px;
         height: 50px;
         border-radius: 25px;
         text-align: center;
         font-size: 1.2rem;
         outline: none;
     }

     section .contact-content input[type="submit"]{
        border:none;
        padding: 10px 185px;
        cursor: pointer;
        outline: none;
        color: azure;
        font-weight: 600;
        font-size: 18px;
        border-radius: 30px;
        background: #979A9A;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        border-top: 1px solid rgba(255,255,255,0.1) ;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        z-index: 1;
        letter-spacing: 1px;
        overflow: hidden;
        transition: 0.5s;
        margin: 20px 230px;
}




     


    </style>
</head>
<body>
<section>
    <img src="images/change-password/mountains_front.png" alt="">
    <img src="images/change-password/mountains_behind.png" alt="">
    <img src="images/change-password/stars.png" alt="">
    <img src="images/change-password/moon.png" alt="">
    <div class="contact-content">
        <form method="post" action="change_password.php" class="sign-in-form">
            <h2 class="title1">THANK YOU..!</h2>
        </form>
    </div>
</section>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>

        <script>

        swal({
        title: "<?php  echo $_SESSION['status']; ?>",
        //   text: "You clicked the button!",
        icon: "<?php echo $_SESSION['status_code']; ?>",
        button: "<?php echo $_SESSION['status_button']; ?>",
        });

        </script>

<?php
    unset($_SESSION['status']);
}
?>


</body>
</html>
