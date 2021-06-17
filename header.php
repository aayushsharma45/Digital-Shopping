<?php
 session_start();
if(isset($_POST['submit'])){
    echo "hello";
    session_destroy();
    header('location:login-page.php');
}
$name = 'LOGIN HERE';
if(isset( $_SESSION['fullname'])){
    $name = $_SESSION['fullname'];

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
    <link rel="stylesheet" href="mobile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="mobile.css.map">


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
    <div class="container" style="max-width: 1500px;">
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
                    <form method="post" action="header.php" style="margin-top: 5px;">
                    <a href="login-page.php" class="px-2" style="color:azure; font-size:20px; margin-top:200px; margin-left:230px; text-transform:uppercase; text-decoration:none; font-family: 'Baloo Bhai 2'; " ><?php echo $name ?></a>
                    </form>
                    
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluids p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><b>HOME</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>CATEGORIES</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php"><b>BLOG</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>ABOUT</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php"><b>CONTACT</b></a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-nav">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <li class="nav-item border rounded-circle mx-2 search-icon">
                            <i class="fas fa-search p-3"></i>
                        </li>
                    </form>
                    <a href="./cart.php" style="color: black;">
                        <li class="nav-item border rounded-circle mx-2 basket-icon">
                            <i class="fas fa-shopping-basket p-3"></i>
                        </li>
                    </a>
                </div>
            </div>
        </nav>
    </div>

</header>

<!-- /Header-->