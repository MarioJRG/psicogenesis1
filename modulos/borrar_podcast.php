<?php
include_once('podcastController.php');
function eliminar (){
    $podcast = new podcast();
    
    if (isset($_GET['id'] )){
        
        $id=$_GET['id'];
        if ($podcast ->eliminarPodcast($id)) {
            
            echo'<script type="text/javascript">
            alert("Podcast Eliminado");
            window.location.href="../podcasts.php?pagina=1";
            </script>';  
              
        }
        
}

    

}
eliminar();

?>