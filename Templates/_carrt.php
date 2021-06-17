<?php
require('Database/DBController.php');
require('Product.php');
$product = new Product($con);
$response = $product->getCartAndWishlistItems("cart", $_SESSION['userID']);
$total = 0;
?>
<main>
    <!--Shopping Content Area-->
    <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Shopping Cart</h5>
            <!--Shopping Cart Items-->
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    // $response = $product->getCartItems($_SESSION['user_id']);
                    foreach ($response as $item) {
                        $total = $total + $item['item_price'] * $item['quantity'];
                    ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo './' . $item['item_image'] ?>" class="img-fluid" alt="cartImage1">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?></h5>
                                <small>product by <?php echo $item['item_brand'] ?></small>
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-rale w-25">

                                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="<?php echo $item['quantity'] ?>" placeholder="1">

                                    </div>
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                                        <input type="submit" class="btn font-baloo text-danger px-3 border-right" name="delete" value="Delete">
                                    </form>
                                    <button type="submit" class="btn font-baloo text-danger">Add to Wishlist</button>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="font-size-20 font-baloo text-danger">
                                    &#8377<span class="product_price"><?php echo $item['item_price'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--Subtotal Section-->
                <div class="col-sm-3">
                    <div class="sub-total text-center mt-2">
                        <h3><i class="fas fa-check"></i>Price Details</h3>
                        <div class="border-top py-4">
                            <div class="item-amount">
                                <h6>Price&nbsp;:&nbsp;<span class="text-danger">&#8377&nbsp;<span class="text-danger" id="item-amount"><?php echo $total; ?></span></span></h6>
                            </div>
                            <div class="item-amount">
                                <h6>Delivery Charge&nbsp;:&nbsp;<span class="text-danger">&#8377&nbsp;<span class="text-danger" id="delievry-price">50</span></span></h6>
                            </div>
                            <hr>
                            <h5>Subtotal&nbsp;:&nbsp;<span class="text-danger">&#8377&nbsp;<span class="text-danger" id="deal-price"><?php $final  = $total + 50;
                                                                                                                                        echo $final; ?></span></span></h5>
                            <a href="ProceedToCheckout.php"><button type="submit" class="payment-btn btn-warning mt-3">Proceed to Buy</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Shopping Content Area-->


    <section class="swipe">
        <div class="swiper-container mySwiper">
            <div class="swiper-head">
                <h2>Featured Products</h2>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/tatasampann1.jpeg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/mango1.jpg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/lays1.jpeg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/fortune1.jpeg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/happiloalmonds.jpeg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/coconut1.jpeg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testBox">
                        <img src="./images/FOOD/fooditems/coconut1.jpeg" alt="">
                        <div class="details">
                            <h3>Tata Sampann<br><span>&#8377 149</span></h3>
                        </div>
                        <a href="#"><button class="add-btn">Add to Cart</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>




</main>