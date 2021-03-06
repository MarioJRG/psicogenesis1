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
     <?php
   include_once('modulos/podcastController.php');
   $id = $_GET['id'];
   $podcast = new podcast();
   $onepodcast = $podcast -> onePodcast($id);
   foreach ($onepodcast as $spodcast){
   ?>
     <!-- bradcam_area_start -->
     <div class="bradcam_area breadcam_bg overlay2">
         <h3><?php echo $spodcast['titulo'] ?></h3>
     </div>
     <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
   
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" alt=""src="data:<?php echo $spodcast['tipoimg'] ?>;base64,<?php  echo base64_encode( $spodcast['imagen'])?>">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo $spodcast['titulo'] ?> </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a class="not-active" href="#"><i class="fa fa-user"></i><?php echo $spodcast['autor'] ?></a></li>
                        <li><a class="not-active" href="#"><i class="fa fa-comments"></i><?php echo $spodcast['categoria'] ?></a></li>
                     </ul>

                     <p class="excert">
                     <?php echo  nl2br($spodcast['descripcion']) ?>
                     </p>
                     
                     <a class="excert" href="<?php echo $spodcast['enlace'] ?>">
                     <?php echo $spodcast['enlace'] ?>
                     </a>
                     
                  </div>
               </div>
                     <?php
                        }

                     ?>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Psicogénesis</p>
                     
                     <ul class="social-icons">
                        <li><a target="_blank" href="https://www.facebook.com/SociedaddePsicologiaClinicayAplicada/"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/psicologoclinicoonline_/?hl=es-la"><i class="fa fa-instagram"></i></a></li>
                     </ul>
                  </div>

                  
                 
               </div>

              
               
               
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  
               <?php include("modulos/categoriasPodcast.php"); ?>

               <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Podcast Recientes</h3>
                            <?php 
                           $topPodcast = $podcast -> VerUltimosPodcast();
                           foreach ($topPodcast as $spodcast) {
                                
                            
                            ?>
                            <div class="media post_item">
                           
                                
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
   <!--================ Blog Area end =================-->

    <!-- footer -->
    <?php include("modulos/footer.php"); ?>
    <!-- footer end -->

    <!-- ventana log in-->
    <?php include("modulos/loggin.php"); ?>
    <!-- ventana log in end -->

   

   <!-- JS here -->
   <?php include("modulos/scripts.php"); ?>
</body>

</html>