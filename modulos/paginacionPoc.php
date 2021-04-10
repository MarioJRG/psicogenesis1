<?php 
function paginacion(){
    if (!$_GET){
        header("Location: ../podcasts.php?pagina=1");
    }
}
paginacion();


?>