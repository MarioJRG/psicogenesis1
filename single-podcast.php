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
                     <h2>
                     <?php echo $spodcast['titulo'] ?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i><?php echo $spodcast['autor'] ?></a></li>
                        <li><a href="#"><i class="fa fa-comments"></i><?php echo $spodcast['categoria'] ?></a></li>
                     </ul>

                     <p class="excert">
                     <?php echo $spodcast['descripcion'] ?>
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

                  
                  <div class="navigation-area">
                     <div class="row">
                     <?php 
                         $podcastNext = new podcast();
                         $podcastPrev = new podcast();

                         $infNext=  $id + 1;

                         $infPrev=  $id - 1;
                         
                         $podcastAnt = $podcastPrev -> onePodcast($infPrev);
                           foreach ($podcastAnt as $spodcast){
                        ?>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="single-podcast.php?id=<?php echo $infPrev ?>">
                                 <img class="img-fluid" alt=""  src="img/post/preview.png">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="single-podcast.php?id=<?php echo $infPrev ?>">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>

                          
                           <div class="detials">
                              <p>Anterior</p>
                              <a href="single-podcast.php?id=<?php echo $infPrev ?>">
                                 <h4> <?php echo $spodcast['titulo'] ?></h4>
                              </a>
                           </div>
                        </div>
                        <?php
                         }
                        ?>
                        <div
                       
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                          <?php 
                           $podcastSig = $podcastNext -> onePodcast($infNext);
                           foreach ($podcastSig as $spodcast){
                          ?>
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="single-podcast.php?id=<?php echo $infNext ?>">
                                 <h4><?php echo $spodcast['titulo'] ?></h4>
                              </a>
                              
                           </div>
                           <div class="arrow">
                              <a href="single-podcast.php?id=<?php echo $infNext ?>">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="single-podcast.php?id=<?php echo $infNext ?>">
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
                  
               <?php include("modulos/categoriasPodcast.php"); ?>

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