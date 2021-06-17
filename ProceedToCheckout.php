<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3350f1ad11.js" crossorigin="anonymous"></script>
    <title>UB || Checkout</title>
    <link rel="stylesheet" href="mobile.css?v=<?php echo time(); ?>">
</head>

<body>
    <section id="top-count">
        <div class="topBar">
            <div class="topBar-content1">
                <h2 clas>1</h2>
                <span>Shipping</span>
            </div>
            <div class="topBar-content2">
                <h2>2</h2>
                <span>Billing</span>
            </div>
        </div>
    </section>

    <section id="checkOut">
        <div class="order-content">
            <h2>Order Details</h2>
            <div class="bOx" style="display: flex;">
                <div class="coL" style="width: 40%; height:100px;">
                    <img src="./images/MOBILE/iphone12mini.jpg" class="img-fluid" alt="OrderImage1">
                </div>
                <div class="bOx-content">
                    <h3 style="color: azure; font-size: 20px; font-weight:400">Iphone 11 mini (64GB)</h3>
                    <h5 style="color: azure; font-size: 15px; font-weight:400">&#8377 59999</h5>
                </div>
                <form method="post" action="">
                    <div class="delete" style="margin-top: 35px; color: azure; font-size: 25px;"> <i class="fas fa-trash-alt"></i></div>
                </form>
            </div>
            <div class="bOx" style="display: flex;">
                <div class="coL" style="width: 40%; height:100px;">
                    <img src="./images/MOBILE/iphone12mini.jpg" class="img-fluid" alt="OrderImage1">
                </div>
                <div class="bOx-content">
                    <h3 style="color: azure; font-size: 20px; font-weight:400">Iphone 11 mini (64GB)</h3>
                    <h5 style="color: azure; font-size: 15px; font-weight:400">&#8377 59999</h5>
                </div>
                <form method="post" action="">
                    <div class="delete" style="margin-top: 35px; color: azure; font-size: 25px;"> <i class="fas fa-trash-alt"></i></div>
                </form>
            </div>
            <div class="row100">
                <div class="col">
                    <h3>Checkout Amount</h3>
                    <span>&#8377 5000/-</span>
                </div>
            </div>

        </div>
        <div class="checkout-content">
            <h2>Shipping Details</h2>

            <form method="post" action="" class="checkout-form">
                <div class="row100">
                    <div class="col">
                        <div class="inPutBox">
                            <input type="tel" name="mobile" style="width: 50%;" required>
                            <span class="text">Mobile</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>

                <div class="row100">
                    <div class="col">
                        <div class="inPutBox textarea">
                            <input type="text" name="address1" required>
                            <span class="text">Address 1</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row100">
                    <div class="col">
                        <div class="inPutBox textarea">
                            <input type="text" name="address2" required>
                            <span class="text">Address 2</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row100">
                    <div class="col">
                        <div class="inPutBox textarea">
                            <input type="text" name="state" style="width: 50%;" required>
                            <span class="text">State</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="inPutBox textarea">
                            <input type="text" pattern="[0-9]+" name="zipCode" style="width: 50%;" required>
                            <span class="text">ZIP code</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>

                <h2>Payment Method</h2>
                <div class="row100">
                    <div class="col">
                        <div class="inPutBox textarea" style="width: 20%; display:flex; align-items:center">
                            <input type="radio" id="COD" name="payment" value="value1">
                            <label for="value1" style="font-size: 20px;">COD</label>
                            <input type="radio" id="Payu" name="payment" value="value2">
                            <label for="value2" style="font-size: 20px;">Payu</label>
                        </div>
                    </div>
                </div>

                <div class="row100">
                    <div class="col">
                        <input type="submit" name="submit_checkout" value="Proceed to Checkout">
                    </div>
                </div>
            </form>

        </div>

    </section>
</body>

</html>