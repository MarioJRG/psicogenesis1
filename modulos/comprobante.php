<?php
include_once('user.php');

include_once("user_session.php");


function comprobar (){
    $user= new Users();
    $userSession = new UserSession();
    if (isset( $_POST['correo']) && isset( $_POST['contraseña'])){
        $correoForm=$_POST['correo'];
        $contraseñaForm=$_POST['contraseña'];
        if ($user ->userExists($correoForm,$contraseñaForm)) {
           $userSession -> setCurrentUser($correoForm);
           header("Location: ../index.php");   
              
        }

}
    header("Location: ../index.php");

}
comprobar();
?>