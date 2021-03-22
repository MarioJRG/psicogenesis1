<?php
include_once('blogController.php');
function eliminar (){
    $blog = new blog();
    
    if (isset($_GET['id'] )){
        
        $id=$_GET['id'];
        if ($blog ->eliminarBlog($id)) {
            
            echo'<script type="text/javascript">
            alert("Blog Eliminado");
            window.location.href="../blog.php";
            </script>';  
              
        }
        
}

    

}
eliminar();

?>