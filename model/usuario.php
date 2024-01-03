<?php
class Usuario{
    private $nombreUser;
    private $email;
    private $nombre;
    private $pwd;

    public function __construct($nombreUser, $email, $nombre, $pwd){
        $this->nombreUser=$nombreUser;
        $this->email=$email;
        $this->nombre=$nombre;
        $this->pwd=$pwd;
    }

    public function getNombreUser(){
        return $this->nombreUser;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPassword(){
        return $this->pwd;
    }

    public function setNombreUser($nombreUser){
        $this->nombreUser = $nombreUser;
        return $this;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function setPassword($pwd){
        $this->pwd = $pwd;
        return $this;
    }
}