<?php
session_start();
require('Database/DBController.php');
require('Constant.php');
require('Mail.php');

$mail = new Mail();
$_SESSION['password_error'] = "";
// Registration Page Commands

if (isset($_POST['submit'])) {
    $is_verified = 'false';
    $activation_code = md5(rand());
    $password_request = 'inactive';
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $_SESSION['password_error'] = '<ul><li>Password should be at least 8 characters in length.</li><li>Should include at least one upper case letter.</li><li>Should include at least one lower case letter.</li><li>Should include at least one number.</li><li>Should include at least one special character.</li></ul>';
    } else {
        $sql = "select * from admin_users where username='$username' and email='$email'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $_SESSION['status'] = "Email already taken";
            $_SESSION['status_code'] = "success";
        } else {
            $reg = "insert into admin_users(username,fullname,contact,email,password,is_verified,email_verification_token,password_request) values ('$username','$fullname','$phone','$email','$password','$is_verified','$activation_code','$password_request')";
            $base_url = "http://localhost/finalyear/email_verification.php";
            $mail_body = "
                     <h2>Hi " . $fullname . ",</h2>
                     <p>Thanks for registeration. Please open this link to verify your email address - " . $base_url . "?activation_code=" . $activation_code . "
                     <p>Best Regards <br> UrbanBasket </p>
                     ";

            $mail->sendMail($mail_body, $email, $fullname, "Email Verification");

            $_SESSION['status'] = "Mail send successfully";
            $_SESSION['status_code'] = "success";

            mysqli_query($con, $reg);
        }
    }
}

$response = array();

// Login Page Commands

if (isset($_POST['submitlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from admin_users where email='$email' && password='$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_array($result);
        if ($row["is_verified"] == "true") {
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['userID'] = $row['user_id'];
            header('location:index.php');
        } else {
            $response['email_verification_error'] = "Please verify your mail id";
            echo  $response['email_verification_error'];
        }
    } else {
        $_SESSION['status'] = "Your EMAIL or PASSWORD is wrong.!";
        $_SESSION['status_code'] = "error";
    }
}

//  Forget Password Page Commands

if (isset($_POST['submit_password'])) {
    $email = $_POST['email'];
    $password_token = md5(rand());
    $sql = "select * from admin_users where email='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_array($result);
        if ($row["password_request"] == "inactive" || ($row["password_request"] == null)) {
            $sql = "update admin_users set password_request = 'active', password_token = '$password_token' where email='$email'";

            $result = mysqli_query($con, $sql);

            $base_url = "http://localhost/finalyear/change_password.php";
            $mail_body = "
            <h2>Hi " . $row["fullname"] . ",</h2>
            <p>Please open this link to change your password - " . $base_url . "?change_password_token=" . $password_token . "
            <p>Best Regards <br> UrbanBasket </p>
            ";

            $mail->sendMail($mail_body, $email, $row["fullname"], "Change Password");
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URBAN BASKET</title>

    <!-- CSS stylesheet-->
    <link rel="stylesheet" href="mobile.css">


    <!--BOOTSTRAP CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!--CDN owl carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <!----Swiper.js---->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- FONTAWESOME CDN-->
    <script src="https://kit.fontawesome.com/3350f1ad11.js" crossorigin="anonymous"></script>

    <!-- Fonts Family-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Lexend+Deca&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">

    <!-- SLICK SLIDER-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <!--Glide styling-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">

    <!--Animate CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



</head>

<body>

    <!-- Header-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="btn-group">
                        <button class="btn border dropdown-toggle my-md-4 my-2 logo-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INR</button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">USD</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 text-center">
                    <h2 class="my-md-3 site-title logo-color">URBAN BASKET</h2>
                </div>
                <div class="col-md-4 col-12 text-right">
                    <p class="my-md-4 header-links">
                        <a href="login-page.php" class="px-2" style="color:azure; font-size:18px"></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluids p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid" style="height: 45px;">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <h5 id="registration">REGISTER</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-nav">


                    </div>
                </div>
            </nav>
        </div>

    </header>

    <!-- /Header-->

    <?php
    include('Templates/_sign-up.php');
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>

        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                //   text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Aww yiss!",
            });
        </script>

    <?php
        unset($_SESSION['status']);
    }
    ?>

    <script src="js/signup.js"></script>

    <?php
    include('footer.php');
    ?>