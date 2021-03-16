<?php
include ('db.php');
class blog extends DB {
    private $nombre;
    private $titulo;
    private $fecha;
    private $descripcion;
    private $blog;
    private $imagen;

    function guardar( $nombre, $titulo, $descripcion, $blog){
        $query = $this ->connect() -> prepare ('INSERT INTO blogs (nombre,titulo,descripcion,blog) 
        VALUES(:nombre,:titulo,:descripcion,:blog)');
        $query ->execute(['nombre'=>$nombre,'titulo'=>$titulo,'descripcion'=>$descripcion,
        'blog'=>$blog]);
        if ($query) {
            return true;
        }  
    }

    function verBlogs(){
       $query = $this -> connect() ->query('SELECT * FROM blogs');
       $all= $query->fetchall(PDO::FETCH_ASSOC);
       return $all; 
    
    }
}

?>