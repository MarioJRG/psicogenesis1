<?php
include_once('blogController.php');

$blog = new blog();
date_default_timezone_set('America/Hermosillo');
$fecha_actual=date("Y-m-d H:i:s");
?>
<form action="pruebla.php" method="post" enctype='multipart/form-data'>
<input type="file" name="img" >
<button type="submit" name='guardar'>guarf</button>

</form>
<?php
if (isset($_REQUEST['guardar'])) {
  
  
 
  $cargarFoto = $_FILES['img']['tmp_name'];
  $tipoImg = $_FILES['img']['type'];
  $nombreImg = $_FILES['img']['name'];
  $foto1 = fopen($_FILES['img']['tmp_name'],'rb');
  $tamaño= $_FILES['img']['size'];
  $foto=fread($foto1,$tamaño);
  $foto3 = addslashes(file_get_contents($_FILES['img']['tmp_name']));
  if($blog -> guardar('Mario','Jesus','Ruiz ','Gonzlaez','Familia',$fecha_actual,$nombreImg,$foto,$tipoImg)){
    echo "ser agrego";
}
}
$id = 27;
$allblog = $blog -> oneBlog($id);
foreach ($allblog as $sblog) {
  ?>
  <img src="data:<?php echo$sblog['tipoimg'] ?>;base64,<?php  echo base64_encode( $sblog['imagen'])?>">
<?php
    echo $sblog['tipoimg'];
} 
//print_r("<pre>");
//print_r($allblog);
//print_r("<pre>");
?>