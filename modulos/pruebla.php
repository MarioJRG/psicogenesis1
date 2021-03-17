<?php
include_once('blogController.php');

$blog = new blog();
date_default_timezone_set('America/Hermosillo');
$fecha_actual=date("Y-m-d H:i:s");
if($blog -> guardar('Mario','Jesus','Ruiz ','Gonzlaez','Familia',$fecha_actual)){
    echo "ser agrego";
}
$allblog = $blog -> verBlogs();
//foreach ($allblog as $sblog) {
  //  echo $sblog;
//} 
print_r("<pre>");
print_r($allblog);
print_r("<pre>");
?>