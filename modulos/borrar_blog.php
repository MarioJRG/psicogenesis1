<?php
include_once('blogController.php');
function eliminar (){
    $blog = new blog();
    
    if (isset($_GET['id'] )){
        
        $id=$_GET['id'];
        if ($blog ->eliminarBlog($id)) {
           
           header("Location: ../blog.php");   
              
        }

}
    header("Location: ../index.php");

}
eliminar();

?>