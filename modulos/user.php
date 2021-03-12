
<?php
include ('db.php');
class Users extends DB {
        private $correo;
        private $contraseña;

        public function userExists($user, $pass){
            $md5pass = md5($pass);

            $query = $this -> connect() -> prepare('SELECT * FROM login WHERE correo = :user AND contraseña = :pass');
            $query -> execute(['user' =>$user,'pass' => $md5pass]);

            if($query->rowCount()){
                return true;
            }else{
                return false;
            }


        }
        public function setUser($user){
            $query = this -> connect() -> prepare('SELECT * FROM login WHERE correo = :user');
            $query -> execute(['user' =>$user]);

            foreach ($query as $currentUser) {
                $this->correo = $correntUser['correo'];
                

            }
        }
        public function getCorreo(){
            return $this->correo;
        }
    }
?>