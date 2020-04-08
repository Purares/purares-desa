<?php
include 'conexion.php';

class User {
    private $nombre;
    private $username;
    private $idUsuario;


    public function userExists($user, $pass){
        
        $stmt=conexion::conectarBD()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');

        
        $stmt->execute(['user' => $user, 'pass' => $pass]);

        if($stmt->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $stmt=conexion::conectarBD()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $stmt->execute(['user' => $user]);
        
        foreach ($stmt as $currentUser) {
            $this->idUsuario = $currentUser['id_usuario'];
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }



}


?>