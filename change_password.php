<?php
require('Database/DBController.php');
require('User.php');

$user = new User();

session_start();

$password_mismatch = "";
if (isset($_GET["change_password_token"])) {

    $activation_code = $_GET["change_password_token"];

    $select_query = "SELECT * FROM admin_users WHERE password_token = '$activation_code'";

    $result=mysqli_query($con,$select_query);
    $row = mysqli_fetch_array($result);
    $user->setId($row['user_id']);
    $_SESSION['id'] = $row['user_id'];
    $_SESSION['password_request'] = $row['password_request'];
}

if(isset($_POST['submit'])){
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    
    if($password != $confirm_password) {
        $password_mismatch = "password did not match";

    }else{
        
        if ($_SESSION['password_request'] == "active") {     
                  
            $sql="update admin_users set password_request = 'inactive', password = '$password' where user_id = '".$_SESSION['id']."'";
            $res=mysqli_query($con,$sql);
            if (isset($res)) {
               $_SESSION['status'] = "Password Updated";
               $_SESSION['status_code'] = "success";
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
         margin-top: 90px;
        position: relative;
        z-index: 1000;
        width: 100%;
        max-width: 1200px;
        padding:140px;
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
         opacity: 0.5;
     }

     section .contact-content .input-field input:hover{
         opacity: 1;
         transition: 0.8s;
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
        background: #3498DB ;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        border-top: 1px solid rgba(255,255,255,0.1) ;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        z-index: 1;
        letter-spacing: 2px;
        overflow: hidden;
        transition: 0.5s;
        margin: 20px 230px;
}

section .contact-content input[type="submit"]:hover{
       background: #2E86C1 ;
       transition: 0.5s;
       box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

    section form span{
        margin-left: 336px;
        letter-spacing: 0.5px;
        color: red;
        font-size: 20px;
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
            <h2 class="title1">Change Password</h2>
            <span class="field_error" id="email_error"><?php echo $password_mismatch ?></span>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="password" name="password" placeholder="Password*" required>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password*" required>
            </div>
            <input type="submit" name="submit" class="btn solid">
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
        button: "Aww yiss!",
        });

        </script>

<?php
    unset($_SESSION['status']);
}
?>


</body>
</html>


