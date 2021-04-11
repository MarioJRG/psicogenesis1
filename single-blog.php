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
   include_once('modulos/blogController.php');
   $id = $_GET['id'];
   $blog = new blog();
   $oneblog = $blog -> oneBlog($id);
   foreach ($oneblog as $sblog){
   ?>
     <!-- bradcam_area_start -->
     <div class="bradcam_area breadcam_bg overlay2">
         <h3><?php echo $sblog['titulo'] ?></h3>
     </div>
     <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
   
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" alt=""src="data:<?php echo $sblog['tipoimg'] ?>;base64,<?php  echo base64_encode( $sblog['imagen'])?>">
                  </div>
                  <div class="blog_details">
                     <h2>
                     <?php echo $sblog['titulo'] ?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a class="not-active" href="#"><i class="fa fa-user"></i><?php echo $sblog['autor'] ?></a></li>
                        <li><a class="not-active" href="#"><i class="fa fa-comments"></i><?php echo $sblog['categoria'] ?></a></li>
                     </ul>
                     <p class="excert">
                     <?php echo $sblog['blog'] ?>
                     </p>
                     
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

                  
                  <div class="navigation-area">
                     <div class="row">
                     <?php 
                         $blogNext = new blog();
                         $blogPrev = new blog();

                         $infNext=  $id + 1;

                         $infPrev=  $id - 1;
                         $blogAnt = $blogPrev -> oneBlog($infPrev);
                           foreach ($blogAnt as $sblog){
                        ?>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="single-blog.php?id=<?php echo $infPrev ?>">
                                 <img class="img-fluid" alt=""  src="img/post/preview.png">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="single-blog.php?id=<?php echo $infPrev ?>">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>

                          
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="single-blog.php?id=<?php echo $infPrev ?>">
                                 <h4> <?php echo $sblog['titulo'] ?></h4>
                              </a>
                           </div>
                        </div>
                        <?php
                         }
                        ?>
                        <div
                       
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                          <?php 
                           $blogSig = $blogNext -> oneBlog($infNext);
                           foreach ($blogSig as $sblog){
                          ?>
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="single-blog.php?id=<?php echo $infNext ?>">
                                 <h4><?php echo $sblog['titulo'] ?></h4>
                              </a>
                              
                           </div>
                           <div class="arrow">
                              <a href="single-blog.php?id=<?php echo $infNext ?>">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="single-blog.php?id=<?php echo $infNext ?>">
                                 <img class="img-fluid" alt="" src="img/post/next.png">
                              </a>
                           </div>
                           <?php
                         }
                        ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="img/blog/author.png" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4>Harvard milan</h4>
                        </a>
                        <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                           our dominion twon Second divided from</p>
                     </div>
                  </div>
               </div>
               
               
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  
                   <?php include("modulos/categorias.php"); ?>

                  <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Blogs Recientes</h3>
                            <?php 
                            $topblog = $blog ->VerUltimos();
                            foreach($topblog as $sblog){
                                
                            
                            ?>
                           <div class="media post_item">                                                        
                              <div class="media-body">
                                    <a href="single-blog.php?id=<?php echo $sblog['id']?>">
                                        <h3><?php  echo $sblog['titulo']?></h3>
                                    </a>
                                    <?php  
                                    $date2=substr($sblog['fecha'],8,-15);
                                    $day2=substr($sblog['fecha'],5,-19);
                                    $año=substr($sblog['fecha'],0,-22);
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