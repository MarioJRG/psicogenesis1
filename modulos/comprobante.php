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
           echo'<script type="text/javascript">
            alert("Login Correcto");
            window.location.href="../index.php";
            </script>';    
              
        }else{
            echo'<script type="text/javascript">
            alert("Login Incorrecto");
            window.location.href="../index.php";
            </script>';  
        }

}
    

}
comprobar();
?>