
<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <?php
    include_once ('modulos/user_session.php');
    $userSession = new UserSession();
    ?>
    <header>
    
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.php">
                                    <img src="img/psicogenesis9.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">inicio</a></li>
                                        <li><a href="servicios.php">Servicios</a></li>
                                        <li><a href="modulos/paginacion.php">blog <?php if(isset( $_SESSION['user'])){?>
                                        <i class="ti-angle-down"></i>
                                        <?php } ?></a>
                                            <?php                         
                                            if(isset( $_SESSION['user'])){                                               
                                            ?>
                                            <ul class="submenu">
                                                <li><a href="modulos/paginacion.php">blog</a></li>
                                                <!--<li><a href="single-blog.php">single-blog</a></li>-->
                                                
                                                    <li><a href="agregar_blog.php">agregar blog</a></li>
                                                
                                            </ul>
                                            <?php } ?>
                                        </li>
                                    
                                        <li><a href="modulos/paginacionPoc.php"">podcast <?php if(isset( $_SESSION['user'])){?>
                                        <i class="ti-angle-down"></i><?php } ?></a>
                                        <?php                           
                                                        
                                                    if(isset( $_SESSION['user'])){                                               
                                                    ?>
                                            <ul class="submenu">
                                                <li><a href="modulos/paginacionPoc.php">podcast</a></li>
                                                <!--<li><a href="single-blog.php">single-blog</a></li>-->
                                                <?php                           
                                                        
                                                    if(isset( $_SESSION['user'])){                                               
                                                    ?>
                                                    <li><a href="agregar_podcast.php">agregar podcast</a></li>
                                                <?php } ?>
                                            </ul>
                                            <?php } ?>
                                        </li>
                                        <li><a href="about.php">Nosotros</a></li>
                                        <li><a href="contact.php">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                
                                <?php
                                
                                
                                if(isset( $_SESSION['user'])){

                               
                                ?>
                                 <div class="live_chat_btn">
                                    <a class="boxed_btn_green" href="modulos/logout.php">
                                        
                                        <span>Logout</span>
                                    </a>
                                </div>
                              
                              <?php }else{?> 
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span>accede</span>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->