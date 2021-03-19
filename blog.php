<!doctype html>
<html class="no-js" lang="zxx">

<?php include("modulos/head.php") ?>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php include("modulos/header.php"); ?>
        <!-- header-end -->
        
        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg overlay2">
                <h3>blog</h3>
            </div>
            <!-- bradcam_area_end -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <?php 
                    include_once('modulos/blogController.php');

                    $blog = new blog();
                    $allblog = $blog -> verBlogs();
                    foreach ($allblog as $sblog) {
                            ?>

                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img alt='' class="card-img rounded-0" src="data:<?php echo $sblog['tipoimg'] ?>;base64,<?php  echo base64_encode( $sblog['imagen'])?>">
                                <a href="#" class="blog_item_date">
                                <?php  
                                    $date=substr($sblog['fecha'],8,-15);
                                    $day=substr($sblog['fecha'],5,-19);
                                    if ($day=='01') {
                                        $day='Enero';
                                    }elseif ($day=='02') {
                                        $day='Febrero';
                                    }elseif ($day=='03') {
                                        $day='Marzo';
                                    }elseif ($day=='04') {
                                        $day='Abril';
                                    }elseif ($day=='05') {
                                        $day='Mayo';
                                    }elseif ($day=='06') {
                                        $day='Junio';
                                    }elseif ($day=='07') {
                                        $day='Julio';
                                    }elseif ($day=='08') {
                                        $day='Agosto';
                                    }elseif ($day=='09') {
                                        $day='Septiembre';
                                    }elseif ($day=='10') {
                                        $day='Octubre';
                                    }elseif ($day=='11') {
                                        $day='Noviembre';
                                    }elseif ($day=='12') {
                                        $day='Diciembre';
                                    }

                                ?>
                                    <h3><?php echo $date?></h3>
                                    <p><?php echo $day?></p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?id=<?php echo $sblog['id']?>">
                                    <h2><?php echo $sblog['titulo']?></h2>
                                </a>
                                <p><?php echo $sblog['descripcion']?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i><?php echo $sblog['autor']?></a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> <?php echo $sblog['categoria']?></a></li>
                                </ul>
                            </div>
                        </article>

                        <?php 
                    }                            
                            ?>

                      
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="img/blog/single_blog_5.png" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>15</h3>
                                    <p>Jan</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>Google inks pact for new 35-storey office</h2>
                                </a>
                                <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                    he earth it first without heaven in place seed it second morning saying.</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <?php include("modulos/categorias.php"); ?>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <div class="media post_item">
                                <img src="img/post/post_1.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_2.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>The Amazing Hubble</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_3.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Astronomy Or Astrology</h3>
                                    </a>
                                    <p>03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_4.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Asteroids telescope</h3>
                                    </a>
                                    <p>01 Hours ago</p>
                                </div>
                            </div>
                        </aside>
                       




                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

   <!-- footer -->
   <?php include("modulos/footer.php"); ?>
    <!-- footer end-->
    
    <!-- link that opens popup -->

    <!-- ventana log in-->
    <?php include("modulos/loggin.php"); ?>
    <!-- ventana log in end -->

    

    <!-- JS here -->
    <?php include("modulos/scripts.php"); ?>
</body>
</html>