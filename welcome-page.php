<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URBAN BASKET</title>
    <link rel="stylesheet" href="mobile.css">
</head>

<body>
    <a href="login-page.php">
        <section id="welcome">
            <video src="./images/production ID_5198949.mp4" autoplay loop muted></video>
            <h2>WELCOME TO YOURS<br><span>URBAN BASKET</span><br><span style="font-size: 1.5rem; margin-top:-100px">CLICK ANYWHERE IN THE SCREEN</span></h2>
            <h6>counter</h6>
        </section>
    </a>

    <script>
        let counter = document.querySelector('h6');
        let count = 1;
        setInterval(() => {
            counter.innerText = count;
            count++

            if (count > 7) location.replace('login-page.php')
        }, 1000)
    </script>
</body>

</html>