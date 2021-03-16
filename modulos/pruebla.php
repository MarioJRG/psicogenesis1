<?php
include_once('blogController.php');

$blog = new blog();

//if($blog -> guardar('Mario','Jesus','Ruiz ','Gonzlaez')){
  //  echo 'ser agrego';
//}
$allblog = $blog -> verBlogs();
//foreach ($allblog as $sblog) {
  //  echo $sblog;
//} 
print_r("<pre>");
print_r($allblog);
print_r("<pre>");
?>