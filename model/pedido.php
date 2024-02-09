<?php
class Pedido{
    private $idPedido;
    private $totalPedido;
    private $descuentoPuntos;
    private $propina;
    private $nombreDeUsuario;
    private $fechaPagado;

    public function __construct($idPedido,$totalPedido,$descuentoPuntos,$propina,$nombreDeUsuario,$fechaPagado){
        $this->idPedido=$idPedido;
        $this->totalPedido=$totalPedido;        
        $this->descuentoPuntos=$descuentoPuntos;
        $this->propina=$propina;
        $this->nombreDeUsuario=$nombreDeUsuario;
        $this->fechaPagado=$fechaPagado;
    }

    public function getIdPedido(){
        return $this->idPedido;
    }
    public function getTotalPedido(){
        return $this->totalPedido;
    }

    public function getDescuentoPuntos(){
        return $this->descuentoPuntos;
    }

    public function getPropina(){
        return $this->propina;
    }

    public function getNombreUser(){
        return $this->nombreDeUsuario;
    }

    public function getFechaPagado(){
        return $this->fechaPagado;
    }


    public function setIdPedido($idPedido){
        $this->idPedido = $idPedido;
        return $this;
    }
    
    public function setTotalPedido($totalPedido){
        $this->totalPedido = $totalPedido;
        return $this;
    }

    public function setDescuentoPuntos($descuentoPuntos){
        $this->descuentoPuntos = $descuentoPuntos;
        return $this;
    }

    public function setPropina($propina){
        $this->propina = $propina;
        return $this;
    }

    public function setNombreUser($nombreDeUsuario){
        $this->nombreDeUsuario = $nombreDeUsuario;
        return $this;
    }

    public function setFechaPagado($fechaPagado){
        $this->fechaPagado = $fechaPagado;
        return $this;
    }
}

?>