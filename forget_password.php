<?php
session_start();
require('Database/DBController.php');


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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


    <!--Glide styling-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">

    <!--Animate CSS-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

   

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
                            <h5 id="registration" >REGISTER</h5>
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

<div class="container1">
    <div class="forms-container1">
        <div class="signin-signup">
            <form method="post" action="login-page.php" class="sign-in-form">
                <h2 class="title1">Forget Password</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" id="email" placeholder="Your Email*" required>
                </div>
                <span class="field_error" id="email_error"></span>
                
                <input type="submit" name="submit_password"  id="btn_submit" value="Submit" class="btn solid">
            </form>

            
    </div>

    <div class="panels-container1">
        <div class="panel left-panel">

            <img src="./images/signup/log.svg" class="images1" alt="">
        </div>
    </div>

</div>


<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

<!-- <script>
    function forget_password(){
        jQuery('#email_error').html('');
        var email=jQuery('#email').val();
        if(email==''){
            jQuery('#email_error').html('Please enter email id');
        }else{
            jQuery('#btn_submit').html('Please Wait...');
            jQuery('#btn_submit').attr('disabled',true);
            jQuery.ajax({
                url:'forget_password_submit.php',
                type:'post',
                data:'email='+email,
                success:function(result){
                    jQuery('#email_error').html(results);
                    jQuery('#btn_submit').html('Submit');
                    jQuery('#btn_submit').attr('disabled',false);
                }
            })
        }
           
}
     -->

</script> 



<?php
include ('footer.php');
?>



