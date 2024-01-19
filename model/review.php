<?php
class Review{
    private $idReview;
    private $nombreUser;
    private $calificacion;
    private $titulo;
    private $texto;

    public function __construct($idReview, $nombreUser, $calificacion, $titulo, $texto){
        $this->idReview=$idReview;
        $this->nombreUser=$nombreUser;
        $this->calificacion=$calificacion;
        $this->titulo=$titulo;
        $this->texto=$texto;
    }

    public function getIdReview(){
        return $this->idReview;
    }

    public function getNombreUser(){
        return $this->nombreUser;
    }

    public function getCalificacion(){
        return $this->calificacion;
    }

    public function getTitle(){
        return $this->titulo;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function setIdReview($idReview){
        $this->idReview = $idReview;
        return $this;
    }

    public function setNombreUser($nombreUser){
        $this->nombreUser = $nombreUser;
        return $this;
    }

    public function setCalificacion($calificacion){
        $this->calificacion = $calificacion;
        return $this;
    }

    public function setTitle($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    public function setTexto($texto){
        $this->texto = $texto;
        return $this;
    }
}