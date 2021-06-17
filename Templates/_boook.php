<?php
require('Product.php');
$product = new Product($con);
?>


<main id="main-site">

    <section class="book-sect">
        <h2 id="text"><span>It's time for <b>BOOKS</b></span><br>Adventure</span></h2>
        <img src="./images/stationary/books/bird1.png" id="bird1">
        <img src="./images/stationary/books/bird2.png" id="bird2">
        <img src="./images/stationary/books/forest.png" id="forest">
        <img src="./images/stationary/books/rocks.png" id="rocks">
        <img src="./images/stationary/books/water.png" id="water">
    </section>


    <!-- Top Sale-->

    <section id="top-sale">
        <div class="container py-5">
            <h4 class="font-rubik font-size-20">Top Sale</h4>
            <hr>
            <!--owl carousel theme-->
            <div class="owl-carousel owl-theme">
                <?php $response = $product->getSection($item_type = 'book', $section_id = '7');
                foreach ($response as $item) {
                ?>
                    <div class="item py-2">
                        <div class="product font-rale">
                            <a href="itempage.php?id=<?php echo $item['item_id'] ?>"><img src="<?php echo './' . $item['item_image'] ?>" alt="product1" class="img-fluid" style="margin-left: 30px; width:70%"></a>
                            <div class="text-center">
                                <h6 style="height: 56px;"><?php echo $item['item_name'] ?></h6>
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
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                                    <input type="submit" name="wishlistsubmit" value="Move to wishlist" class="btn text-danger font-size-8" style="margin-top: -20px; font-size: 13px; padding-bottom: 2px; transition: 0.6s">
                                </form>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                                    <input type="submit" name="cartsubmit" value="Add to cart" class="btn btn-warning font-size-12" style="transition: 0.6s">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!--/Top Sale-->


    <!--Special Price-->
    <section id="special-price" style="    margin-top: 10px;">
        <div class="container">
            <h4 class="font-rubik font-size-20">Special Price</h4>
            <div id="filters" class="button-group text-right font-baloo font-size-16" style="width: 1518px; height:65px; background-color: #d1e2e9; margin-left: -111px;">

                <?php $response = $product->getUniqueBrandName($item_type = 'book', $section_id = '6');
                foreach ($response as $item) {
                ?>
                    <button class="btn" style="margin-top: 10px;font-size: 18px; transition:0.6s" data-filter="<?php echo '.' . $item['item_brand'] ?>"><?php echo $item['item_brand'] ?></button>
                <?php } ?>
            </div>

            <div class="grid" style="width: 1312px;">
                <?php $response = $product->getAllData($item_type = 'book', $section_id = '6');
                foreach ($response as $item) {
                ?>
                    <div class="grid-item <?php echo $item['item_brand'] ?> border" style="height: 374px;">
                        <div class="item py-1" style="width: 195px;">
                            <div class="product font-rale">
                                <a href="itempage.php?id=<?php echo $item['item_id'] ?>"><img src="<?php echo './' . $item['item_image'] ?>" alt="product1" class="img-fluid"></a>
                                <div class="text-center">
                                    <h6 style="height: 90px;"><?php echo $item['item_name'] ?></h6>
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
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                                        <input type="submit" name="wishlistsubmit" value="Move to wishlist" class="btn text-danger font-size-8" style="margin-top: -20px; font-size: 13px; padding-bottom: 2px; transition: 0.6s">
                                    </form>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                                        <input type="submit" name="cartsubmit" value="Add to cart" class="btn btn-warning font-size-12" style="transition: 0.6s">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <!--/Special Price-->

</main>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>