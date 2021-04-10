<?php 
function paginacion(){
    if (!$_GET){
        header("Location: ../blog.php?pagina=1");
    }
}
paginacion();


?>