<main>

    <section class="site-title4">
        <div class="site-background">
        <?php
            echo "<h3>WELCOME</h3>";
            echo $_SESSION['fullname'];
            ?>
            <h1>Amazing Place on Earth</h1>
            <a href="#"><button class="btn">EXPLORE</button></a>
            <div class="para">
                <p><b>“Pursue what catches your heart, not what catches your eyes.”</b></p>
            </div>
        </div>
    </section>

    <!-- Blog Carousel -->


    <!-- /Blog Carousel -->

    <!-- Site Content -->
    <section class="container">
        <div class="site-content2">
            <div class="posts">
                <div class="post-content">
                    <div class="post-image">
                        <div>
                            <img src="./images/blog/subpages/shutterstock_458437996-.jpg" class="img" alt="blog1">
                        </div>
                        <div class="post-info flex-row">
                            <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;
                            <?php
                            // Return current date from the remote server
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('d-m-y h:i:s');
                            echo $date;
                            ?>
                            </span>
                            <span>2 comments</span>
                        </div>
                    </div>
                    <div class="post-title">
                        <a href="/LINKS/software.html">Animal you haven’t heard of, but still needs help</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique aliquam architecto repellat nostrum eos perspiciatis dignissimos soluta incidunt deserunt! Tempore sunt dolorum illum aperiam autem! Ipsum iste amet dolorum quas fugit, quis quam eum. Aliquid harum maxime totam quia illo?</p>
                        <a href="/LINKS/software.html"><button class="btn post-btn" style="background-color: rgb(209, 209, 209); ">Read More &nbsp;<i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>
                <hr>
                <div class="post-content">
                    <div class="post-image">
                        <div>
                            <img src="./images/blog/Blog-post/6029.jpg_wh860.jpg" class="img" alt="blog1">
                        </div>
                        <div class="post-info flex-row">
                            <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;April 23, 2021</span>
                            <span>2 comments</span>
                        </div>
                    </div>
                    <div class="post-title">
                        <a href="#">Why should boys have all the fun? It's also women who are making india a peace loving country</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique aliquam architecto repellat nostrum eos perspiciatis dignissimos soluta incidunt deserunt! Tempore sunt dolorum illum aperiam autem! Ipsum iste amet dolorum quas fugit, quis quam eum. Aliquid harum maxime totam quia illo?</p>
                        <button class="btn post-btn" style="background-color: rgb(209, 209, 209); ">Read More &nbsp;<i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <hr>
                <div class="post-content">
                    <div class="post-image">
                        <div>
                            <img src="./images/blog/Blog-post/Cooking-and-Nutrition.jpg" class="img" alt="blog1">
                        </div>
                        <div class="post-info flex-row">
                            <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;April 23, 2021</span>
                            <span>2 comments</span>
                        </div>
                    </div>
                    <div class="post-title">
                        <a href="#">Why should boys have all the fun? It's also women who are making india a peace loving country</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique aliquam architecto repellat nostrum eos perspiciatis dignissimos soluta incidunt deserunt! Tempore sunt dolorum illum aperiam autem! Ipsum iste amet dolorum quas fugit, quis quam eum. Aliquid harum maxime totam quia illo?</p>
                        <button class="btn post-btn" style="background-color: rgb(209, 209, 209); ">Read More &nbsp;<i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <hr>
                <div class="post-content">
                    <div class="post-image">
                        <div>
                            <img src="./images/blog/Blog-post/124383.jpg" class="img" alt="blog1">
                        </div>
                        <div class="post-info flex-row">
                            <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;April 23, 2021</span>
                            <span>2 comments</span>
                        </div>
                    </div>
                    <div class="post-title">
                        <a href="#">Why should boys have all the fun? It's also women who are making india a peace loving country</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique aliquam architecto repellat nostrum eos perspiciatis dignissimos soluta incidunt deserunt! Tempore sunt dolorum illum aperiam autem! Ipsum iste amet dolorum quas fugit, quis quam eum. Aliquid harum maxime totam quia illo?</p>
                        <button class="btn post-btn" style="background-color: rgb(209, 209, 209); ">Read More &nbsp;<i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <hr>
            </div>
            <aside class="sidebar">
                <div class="category">
                    <h2>Category</h2>
                    <ul class="category-list">
                        <li class="list-items">
                            <a href="./blog-ocean.php" >Ocean World</a>
                        </li>
                        <li class="list-items">
                            <a href="#">Technology</a>
                        </li>
                        <li class="list-items">
                            <a href="/LINKS/space.html">Space Adventures</a>
                        </li>
                        <li class="list-items">
                            <a href="#">Nutrition</a>
                        </li>
                        <li class="list-items">
                            <a href="#">Fashion</a>
                        </li>
                        </li>
                        <li class="list-items">
                            <a href="#">Travel</a>
                        </li>
                    </ul>
                </div>

            </aside>
        </div>
    </section>

    <!-- /Site Content-->

    <div class="login-popup">
        <div class="box">
            <div class="close-btn" style="--i:1">X</div>
            <div class="img-area">
                <img src="./images/blog/subpages/pexels-eberhard-grossgasteiger-1612461.jpg" alt="">
            </div>
            <div class="form">

                <form method="post" action="./blog-validation.php">
                    <div class="form-group">
                        <input type="text" name="fullname" placeholder="NAME", class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="EMAIL" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="PASSWORD" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox">Remember me
                        </label>
                    </div>
                    <button type="submit" name="submit" value="blogregister" class="btn-popup">REGISTER</button>
                </form>
            </div>
        </div>
    </div>



</main>