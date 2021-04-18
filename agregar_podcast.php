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
         <h3>Agregar Podcast</h3>
     </div>
     <!-- bradcam_area_end -->


   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   
   <script>
   function validar(){
      
      //Almacenamos los valores
      titulo=$('#titulo').val();
      
      //Comprobamos la longitud de caracteres
      if (titulo.length<170){
         return true;
      }
      else {
         alert('Maximo 170 caracteres');
         return false;
         
      }

   }
   </script>

   <!--================Blog Area =================-->
   <form action="agregar_podcast.php" method="post" enctype='multipart/form-data' onSubmit='return validar();'> 
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  
                  <div class="blog_details">
                     <h2>Publicar un nuevo podcast
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
                           <div class="form-select" id="default-select">
                              <label for="titulo">Título:</label>
                              <input type="text" id="titulo" name="titulo">
                           </div>
                     </div>
                     

                     <div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-star" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select">
											<select name='categoria'>
												
									<option value="Familia y pareja">Familia y Pareja</option>
									<option value="Crianza positiva">Crianza Positiva</option>
									<option value="Neuropsicologia">Neuropsicologia</option>
									<option value="Vida laboral">Vida Laboral</option>
									</select>
								</div>
							</div>
                  
                     <label for="img">Subir imagen:</label>
                     <input type="file" name="img" >
                     <div class="col-12 mt-10">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="descripcion" id="descripcion" cols="15" rows="6"
                                 placeholder="Escribe una breve descripción..."></textarea>
                           </div>
                     </div>

                 

							<div class="col-12 mt-10">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="enlace" id="enlace" cols="30" rows="9"
                                 placeholder="Enlace del podcast..."></textarea>
                           </div>
                     </div>
                     
                     <div class="form-group">
                        <button type="submit" name='subirPodcast' class="button button-contactForm btn_1 boxed-btn">Publicar</button>
                     </div>
                     
                  </div>
               </div>
               </form>      
            <?php
               include_once('modulos/podcastController.php');

               $podcastG = new podcast();
               date_default_timezone_set('America/Hermosillo');
               $fecha_actual=date("Y-m-d H:i:s");
               if(isset($_REQUEST['subirPodcast'])){
                  if (isset($_POST['autor'])&&isset($_POST['titulo'])&&isset($_POST['categoria'])&&
                  isset($_POST['descripcion'])&&isset($_POST['enlace'])){
                     $autor=$_POST['autor'];
                     $titulo=$_POST['titulo'];
                     $categoria=$_POST['categoria'];
                     $descripcion=$_POST['descripcion'];
                     $enlace=$_POST['enlace'];
                     if (!empty($_FILES['img']['name'])){

                     
                     $cargarFoto = $_FILES['img']['tmp_name'];
                     $tipoImg = $_FILES['img']['type'];
                     $nombreImg = $_FILES['img']['name'];
                     $foto1 = fopen($_FILES['img']['tmp_name'],'rb');
                     $tamaño= $_FILES['img']['size'];
                     $foto=fread($foto1,$tamaño);
                     $foto3 = addslashes(file_get_contents($_FILES['img']['tmp_name']));
                     
                     if(empty($autor)){
                        echo '<Script> alert("Falto nombre de autor")</Script>';
                     }elseif(empty($titulo)){
                        echo '<Script> alert("Falto titulo ")</Script>';
                     }elseif(empty($descripcion)){
                        echo '<Script> alert("Falto  descripcion")</Script>';
                     }elseif(empty($enlace)){
                        echo '<Script> alert("Falto  enlace")</Script>';
                     }elseif(empty($foto)){
                        echo '<Script> alert("Falto imagen")</Script>';
                     }else{
                        if($podcastG -> guardar($autor,$titulo,$descripcion,$enlace,$categoria,$fecha_actual,$nombreImg,$foto,$tipoImg)){
                           echo '<Script> alert("Guardado")</Script>';
                        }else{
                           echo '<Script> alert("Error")</Script>';
                        }

                     }
                  }else{
                     echo '<Script> alert("Falta Imagen del Podcast")</Script>';
                  }
                     
                  }else{
                     echo '<Script> alert("Error")</Script>';
                  }
               }
            ?>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  
               <?php include("modulos/categoriasPodcast.php"); ?>
                  
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