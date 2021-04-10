<?php
include ('db.php');
class podcast extends DB {
    private $autor;
    private $titulo;
    private $fecha;
    private $descripcion;
    private $enlace;
    private $categoria;

    private $imagen;

    function guardar( $autor, $titulo, $descripcion, $enlace,$categoria,$fecha,$nombreimg,$imagen,$tipoimg){
        
        
        $query = $this ->connect() -> prepare ('INSERT INTO podcasts 
        (autor,titulo,descripcion,enlace,categoria,fecha,nombreimg,imagen,tipoimg) 
        VALUES(:autor,:titulo,:descripcion,:enlace,:categoria,:fecha,:nombreimg,:imagen,:tipoimg)');

            

        $query ->bindParam(':autor',$autor,PDO::PARAM_STR);
        $query ->bindParam(':titulo',$titulo,PDO::PARAM_STR);
        $query ->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
        $query ->bindParam(':enlace',$enlace,PDO::PARAM_STR);
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

    function verPodcasts(){
       $query = $this -> connect() ->query('SELECT * FROM podcasts');
       $all= $query->fetchall(PDO::FETCH_ASSOC);
       return $all; 
    
    }

    function onePodcast($id){
        $query = $this ->connect() -> prepare ('SELECT * FROM podcasts WHERE id = :id');
        
        $query->execute([':id'=>$id]);
        $all =$query->fetchall(PDO::FETCH_ASSOC);
        return $all; 
    }

    function contarCategorias(){
        $query = $this -> connect() ->query('SELECT categoria, count(*) FROM podcasts group by categoria');
        $all= $query->fetchall(PDO::FETCH_ASSOC);
        return $all;      
    }

    function eliminarPodcast($id){
        $query = $this -> connect() ->prepare('DELETE FROM podcasts WHERE id=:id');
        $query->execute([':id'=>$id]);
        
         if ($query) {
             return true;
         }             
               
    }
    function VerUltimosPodcast(){
        $query = $this -> connect() ->query('SELECT * FROM podcast order by id desc limit 5');
        $all= $query->fetchall(PDO::FETCH_ASSOC);
        return $all; 
    }

    

     
    
}

?>