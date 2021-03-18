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
         <h3>Agregar Blog</h3>
     </div>
     <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <form action="agregar_blog.php" method="post" enctype='multipart/form-data'> 
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  
                  <div class="blog_details">
                     <h2>Escribir nuevo blog
                     </h2>

                     <div class="input-group-icon mt-10">
                     <div class="icon"><i class="" aria-hidden="true"></i></div>
                     <div class="form-select" id="default-select"">
                     <label for="autor">Autor:</label>
                        <input type="text" id="autor" name="autor">
                        </div>
                        </div>

                        <div class="input-group-icon mt-10">
                     <div class="icon"><i class="" aria-hidden="true"></i></div>
                     <div class="form-select" id="default-select"">
                     <label for="titulo">Titulo:</label>
                        <input type="text" id="titulo" name="titulo">
                        </div>
                        </div>


                     <div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-star" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
											<select name='categoria'>
												
									<option value="familia y pareja">Familia y Pareja</option>
									<option value="crianza positiva">Crianza Positiva</option>
									<option value="neuropsicologia">Neuropsicologia</option>
									<option value="vida laboral">Vida Laboral</option>
									</select>
								</div>
							</div>
                  <!--
                     <div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
											<select>
												<option value=" 1">Autor</option>
									<option value="1">Dhaka</option>
									<option value="1">Dilli</option>
									<option value="1">Newyork</option>
									<option value="1">Islamabad</option>
									</select>
								</div>
							</div>
-->
<label for="img">Subir Imagen:</label>
<input type="file" name="img" >
                     <div class="col-12 mt-10">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="descripcion" id="descripcion" cols="15" rows="6"
                                 placeholder="Escribe una breve descripcion"></textarea>
                           </div>
                     </div>

                 

							<div class="col-12 mt-10">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="blog" id="blog" cols="30" rows="9"
                                 placeholder="Escribe el contenido de tu blog..."></textarea>
                           </div>
                     </div>
                     
                     <div class="form-group">
                        <button type="submit" name='subirBlog' class="button button-contactForm btn_1 boxed-btn">Publicar</button>
                     </div>
                     
                  </div>
               </div>
               </form>      
            <?php
               include_once('modulos/blogController.php');

               $blogG = new blog();
               date_default_timezone_set('America/Hermosillo');
               $fecha_actual=date("Y-m-d H:i:s");
               if(isset($_REQUEST['subirBlog'])){
                  if (isset($_POST['autor'])&&isset($_POST['titulo'])&&isset($_POST['categoria'])&&
                  isset($_POST['descripcion'])&&isset($_POST['blog'])){
                     $autor=$_POST['autor'];
                     $titulo=$_POST['titulo'];
                     $categoria=$_POST['categoria'];
                     $descripcion=$_POST['descripcion'];
                     $blog=$_POST['blog'];

                     $cargarFoto = $_FILES['img']['tmp_name'];
                     $tipoImg = $_FILES['img']['type'];
                     $nombreImg = $_FILES['img']['name'];
                     $foto1 = fopen($_FILES['img']['tmp_name'],'rb');
                     $tamaño= $_FILES['img']['size'];
                     $foto=fread($foto1,$tamaño);
                     $foto3 = addslashes(file_get_contents($_FILES['img']['tmp_name']));

                     if($blogG -> guardar($autor,$titulo,$descripcion,$blog,$categoria,$fecha_actual,$nombreImg,$foto,$tipoImg)){
                        echo '<Script> alert("Guardado")</Script>';
                     }else{
                        echo '<Script> alert("error")</Script>';
                     }
                  }else{
                     echo '<Script> alert("error")</Script>';
                  }
               }
            ?>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Categorías</h4>
                     <ul class="list cat-list">
                        <li>
                           <a href="#" class="d-flex">
                              <p>Resaurant food</p>
                              <p>(37)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Travel news</p>
                              <p>(10)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Modern technology</p>
                              <p>(03)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Product</p>
                              <p>(11)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Inspiration</p>
                              <p>(21)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Health Care</p>
                              <p>(21)</p>
                           </a>
                        </li>
                     </ul>
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