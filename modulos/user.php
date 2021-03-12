
<?php
class Users extends DB {
        private $correo;
        private $contraseña;

        public function userExists($user, $pass){
            $md5pass = md5($pass);

            $query = this -> connect() -> prepare('SELECT * FROM login WHERE correo = :user AND contraseña = :pass');
            $query -> execute(['user' =>$user,'contraseña' => $pass])


        }
    }
?>