<?php
include ('db.php');
class blog extends DB {
    private $autor;
    private $titulo;
    private $fecha;
    private $descripcion;
    private $blog;
    private $categoria;

    private $imagen;

    function guardar( $autor, $titulo, $descripcion, $blog,$categoria,$fecha){
        $query = $this ->connect() -> prepare ('INSERT INTO blogs (autor,titulo,descripcion,blog,categoria,fecha) 
        VALUES(:autor,:titulo,:descripcion,:blog,:categoria,:fecha)');
        $query ->execute(['autor'=>$autor,'titulo'=>$titulo,'descripcion'=>$descripcion,
        'blog'=>$blog,'categoria'=>$categoria,'fecha'=>$fecha]);
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