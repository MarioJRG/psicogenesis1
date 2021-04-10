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
        <h3>Podcasts</h3>
    </div>
    <!-- bradcam_area_end -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <?php 
                    include_once('modulos/podcastController.php');

                    $podcast = new podcast();
                    $allpodcast = $podcast -> verPodcasts();
                    foreach ($allpodcast as $spodcast) {
                            ?>

                        <article class="blog_item">
                            <div class="blog_item_img">
                            <a href="single-podcast.php?id=<?php echo $spodcast['id']?>">
                            <img alt='' class="card-img rounded-0" src="data:<?php echo $spodcast['tipoimg'] ?>;base64,<?php  echo base64_encode( $spodcast['imagen'])?>">
                            </a>
                                
                                <a href="#" class="blog_item_date">
                                <?php  
                                    $date=substr($spodcast['fecha'],8,-15);
                                    $day=substr($spodcast['fecha'],5,-19);
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
                                <a class="d-inline-block" href="single-podcast.php?id=<?php echo $spodcast['id']?>">
                                    <h2><?php echo $spodcast['titulo']?></h2>
                                </a>
                                <p><?php echo $spodcast['descripcion']?></p>
                                <a class="excert" href="<?php echo $spodcast['enlace'] ?>">
                                <?php echo $spodcast['enlace'] ?>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i><?php echo $spodcast['autor']?></a></li>
                                    <li><a href="#" class="not-active"><i class="fa fa-comments"></i> <?php echo $spodcast['categoria']?></a></li>
                                </ul>
                                
                                <?php                           
                                                        
                                if(isset( $_SESSION['user'])){                                               
                                ?>
                               
                                <div class="button-group-area mt-10">
                                    
                                    <a href="modulos/borrar_podcast.php?id=<?php echo $spodcast['id']?>" class="mt-10 genric-btn danger-border circle">Eliminar Podcast</a>                                    
                                    
                                </div>
                                
                                <?php } ?>
                                
                            </div>
                        </article>

                        <?php 
                    }                            
                            ?>

                      
                        
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
                        

                        <?php include("modulos/categoriasPodcast.php"); ?>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Blogs Recientes</h3>
                            <?php 
                           $topPodcast = $podcast -> VerUltimosPodcast();
                           foreach ($topPodcast as $spodcast) {
                                
                            
                            ?>
                            <div class="media post_item">
                           
                                <img alt='' class="card-img rounded-0" src="data:<?php echo  $spodcast['tipoimg'] ?>;base64,<?php  echo base64_encode(  $spodcast['imagen'])?>"width="20px" height="50x">
                                <div class="media-body">
                                    <a href="single-blog.php?id=<?php echo $spodcast['id']?>">
                                        <h3><?php  echo  $spodcast['titulo']?></h3>
                                    </a>
                                    <?php  
                                    $date2=substr( $spodcast['fecha'],8,-15);
                                    $day2=substr( $spodcast['fecha'],5,-19);
                                    $año=substr( $spodcast['fecha'],0,-22);
                                    if ($day2=='01') {
                                        $day2='Enero';
                                    }elseif ($day2=='02') {
                                        $day2='Febrero';
                                    }elseif ($day2=='03') {
                                        $day2='Marzo';
                                    }elseif ($day2=='04') {
                                        $day2='Abril';
                                    }elseif ($day2=='05') {
                                        $day2='Mayo';
                                    }elseif ($day2=='06') {
                                        $day2='Junio';
                                    }elseif ($day2=='07') {
                                        $day2='Julio';
                                    }elseif ($day2=='08') {
                                        $day2='Agosto';
                                    }elseif ($day2=='09') {
                                        $day2='Septiembre';
                                    }elseif ($day2=='10') {
                                        $day2='Octubre';
                                    }elseif ($day2=='11') {
                                        $day2='Noviembre';
                                    }elseif ($day2=='12') {
                                        $day2='Diciembre';
                                    }

                                ?>
                                    <p><?php echo $date2?> <?php echo $day2?> del <?php echo $año?></p>
                                </div>
                            </div>
                            <?php
                        }
                            ?>

                            
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