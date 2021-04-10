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

    function guardar( $autor, $titulo, $descripcion, $blog,$categoria,$fecha,$nombreimg,$imagen,$tipoimg){
        
        
        $query = $this ->connect() -> prepare ('INSERT INTO blogs 
        (autor,titulo,descripcion,blog,categoria,fecha,nombreimg,imagen,tipoimg) 
        VALUES(:autor,:titulo,:descripcion,:blog,:categoria,:fecha,:nombreimg,:imagen,:tipoimg)');

            

        $query ->bindParam(':autor',$autor,PDO::PARAM_STR);
        $query ->bindParam(':titulo',$titulo,PDO::PARAM_STR);
        $query ->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
        $query ->bindParam(':blog',$blog,PDO::PARAM_STR);
        $query ->bindParam(':categoria',$categoria,PDO::PARAM_STR);
        $query ->bindParam(':fecha',$fecha,PDO::PARAM_STR);
        $query ->bindParam(':nombreimg',$nombreimg,PDO::PARAM_STR);
        $query ->bindParam(':imagen',$imagen,PDO::PARAM_LOB);
        $query ->bindParam(':tipoimg',$tipoimg,PDO::PARAM_STR);

        $query->execute();
       // $query ->execute(['autor'=>$autor,'titulo'=>$titulo,'descripcion'=>$descripcion,
        //'blog'=>$blog,'categoria'=>$categoria,'fecha'=>$fecha]);
        if ($query) {
            return true;
        }  
    }

    function verBlogs(){
       $query = $this -> connect() ->query('SELECT * FROM blogs');
       $all= $query->fetchall(PDO::FETCH_ASSOC);
       return $all; 
    
    }

    function oneBlog($id){
        $query = $this ->connect() -> prepare ('SELECT * FROM blogs WHERE id = :id');
        
        $query->execute([':id'=>$id]);
        $all =$query->fetchall(PDO::FETCH_ASSOC);
        return $all; 
    }

    function contarCategorias(){
        $query = $this -> connect() ->query('SELECT categoria, count(*) FROM blogs group by categoria');
        $all= $query->fetchall(PDO::FETCH_ASSOC);
        return $all;      
    }

    function eliminarBlog($id){
        $query = $this -> connect() ->prepare('DELETE FROM blogs WHERE id=:id');
        $query->execute([':id'=>$id]);
        
         if ($query) {
             return true;
         }             
               
    }
    function VerUltimos(){
        $query = $this -> connect() ->query('SELECT * FROM blogs order by id desc limit 5');
        $all= $query->fetchall(PDO::FETCH_ASSOC);
        return $all; 
    }

    function verPaginados($comienzo){
        $query = $this ->connect() -> prepare ('SELECT * FROM blogs order by id desc limit :comienzo,4');
        
        $query->execute([':comienzo'=>$comienzo]);
        $all =$query->fetchall(PDO::FETCH_ASSOC);
        return $all; 
    }

     
    
}

?>