<?php
require_once('Product.php');
$product = new Product($con);
$id = $_GET["id"];
if (isset($_POST['cartsubmit'])) {
    if (!isset($_SESSION['userID'])) {
        echo "First Login then Add into cart";
    } else {
        $user_id = $_SESSION['userID'];
        $item_id = $_POST['item_id'];
        $sql = "select * from cart where item_id = '$item_id' and user_id = '$user_id'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        if ($num >= 1) {
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $quantity = $row['quantity'];
            $quantity = $quantity + 1;
            $query = "update cart set quantity = '$quantity' where item_id = '$item_id' and user_id = '$user_id'";
            mysqli_query($con, $query);
        } else {
            $query = "insert into cart(user_id, item_id, quantity) values ('$user_id','$item_id', '1')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "Inserted";
            }
        }
    }
}
?>


<!-- /Header-->
<main id="main-site">

    <!--Product-->
    <section id="product" class="py-3">
        <div class="container">
            <?php
            $response = $product->getItem($id);
            foreach ($response as $item) {
                $price = $item['item_price'];
                $discountedprice = $price - $price / 10;
                $discount = $price / 10;
            ?>
                <div class="row">
                    <div class="col-sm-6" style="text-align: center;">
                        <img src="<?php echo './' . $item['item_image'] ?>" alt="product" class="img-fluid" style="height: 500px">
                        <div class="form-row pt-2 font-size-20 font-baloo" style="display: flex;">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-danger form-control" style="width:90%">Proceed to Buy</button>
                            </div>
                            <div class="col">
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                                    <input type="submit" name="cartsubmit" value="Add to cart" class="btn btn-warning font-size-12" style="transition: 0.6s; width:90%">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?></h5>
                        <small>powered by <?php echo $item['item_brand'] ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">400+ ratings | 200+ answers</a>
                        </div>
                        <hr class="m-0">

                        <!--Poduct Sale-->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>M.R.P:</td>
                                <td><strike>&#8377 <?php echo $item['item_price'] ?></strike></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Deal Price:</td>
                                <td class="font-size-20 text-danger"><span>&#8377 <?php echo $discountedprice ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;inclusive of all taxes-/</small></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>You save:</td>
                                <td><span class="font-size-12 text-danger">&#8377 <?php echo $discount ?></span></td>
                            </tr>
                        </table>
                        <!--/Product Sale-->

                        <!--Policy-->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5s">
                                    <div class="font-size-12 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" font-rale style='text-decoration:none;font-size: 13px;'>10 days<br>Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-12 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" font-rale style='text-decoration:none;font-size: 13px;'>Urban Basket<br>Delivery</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-12 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" font-rale style='text-decoration:none;font-size: 13px;'>1 Year<br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!--/Policy-->
                        <hr>

                        <!--order details-->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by: 28 jan- 5 feb</small>
                            <small>sold by <a href="#" style="text-decoration: none;">Nearby Electronics</a></small>
                        </div>

                        <!--Product QTY section-->
                        <div class="row">
                            <div class="col-6">
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Qty:</h6>
                                    <div class="counter_container">
                                        <div class="sub" style="display:inline; width:20px; height:20px; font-size: 18px;" onclick="decreaseItemSize()">-</div>
                                        <input style="display:inline; width:40px; height:20px; text-align:center; margin:0 10px;" type="text" name="quantity" id="quantity" value="1">
                                        <div class="add" style="display:inline; width:20px; height:20px" onclick="increaseItemSize()">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Product QTY section-->



                    </div>

                    <div class="col-12">
                        <h6 class="font-rubik" style="margin-top: 45px;">Product Description</h6>
                        <hr>
                        <p class="font-rale font-size-14"><?php echo $item['item_descr'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--/Product-->

    <!-- Top Sale-->

    <section id="top-sale">
        <div class="container py-5">
            <h4 class="font-rubik font-size-20">Top Sale</h4>
            <hr>
            <!--owl carousel theme-->
            <div class="owl-carousel owl-theme">
                <?php $response = $product->getSection();
                foreach ($response as $item) {
                    if ($item['item_id'] == $id) {
                        continue;
                    }
                ?>
                    <div class="item py-2">
                        <div class="product font-rale">
                            <a href="itempage.php?id=<?php echo $item['item_id'] ?>"><img src="<?php echo './' . $item['item_image'] ?>" alt="product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span>&#8377 <?php echo $item['item_price'] ?></span>
                                </div>
                                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--/Top Sale-->




</main>