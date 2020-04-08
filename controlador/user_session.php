<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user,$userId){
        $_SESSION['user'] =$user;

        
        $_SESSION['userId'] =$userId;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>