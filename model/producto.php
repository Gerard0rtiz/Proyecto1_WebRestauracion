<?php
class Producto{
    private $idProd;
    private $imagenProd;
    private $nombreProd;
    private $precioProd;
    private $idCat;

    public function __construct($idProd, $imagenProd, $nombreProd, $precioProd, $idCat){
        $this->idProd=$idProd;
        $this->imagenProd=$imagenProd;
        $this->nombreProd=$nombreProd;
        $this->precioProd=$precioProd;
        $this->idCat=$idCat;
    }

    public function getIdProd(){
        return $this->idProd;
    }

    public function getNombreProd(){
        return $this->nombreProd;
    }

    public function getImagenProd(){
        return $this->imagenProd;
    }

    public function getPrecioProd(){
        return $this->precioProd;
    }

    public function getIdCat(){
        return $this->idCat;
    }
    
    public function setNombreProd($nombreProd){
        $this->nombreProd = $nombreProd;
        return $this;
    }

    public function setIdProd($idProd){
        $this->idProd = $idProd;
        return $this;
    }

    public function setImagenProd($imagenProd){
        $this->imagenProd = $imagenProd;
        return $this;
    }

    public function setPrecioProd($precioProd){
        $this->precioProd = $precioProd;
        return $this;
    }

    public function setIdCat($idCat){
        $this->idCat = $idCat;
        return $this;
    }

}

?>