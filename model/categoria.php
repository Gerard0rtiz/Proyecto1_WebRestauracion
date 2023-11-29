<?php
class Categoria{
    private $idCat;
    private $nombreCat;

    public function __construct($idCat, $nombreCat){
        $this->idCat=$idCat;
        $this->nombreCat=$nombreCat;
    }

    public function getIdCat(){
        return $this->idCat;
    }

    public function getNombreCat(){
        return $this->nombreCat;
    }

    public function setIdCat($idCat){
        $this->idCat = $idCat;
        return $this;
    }

    public function setNombreCat($nombreCat){
        $this->nombreCat = $nombreCat;
        return $this;
    }

}

?>