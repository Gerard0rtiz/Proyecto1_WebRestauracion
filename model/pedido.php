<?php
class lineaPedido{
    private $idPedido;
    private $idProducto;
    private $fechaDePagado;
    private $nombreDeUsuario;
    private $cantidad;
    private $precioUnitario;

    public function __construct($idPedido,$idProducto,$fechaDePagado,$nombreDeUsuario,$cantidad,$precioUnitario){
        $this->idPedido=$idPedido;
        $this->idProducto=$idProducto;
        $this->fechaDePagado=$fechaDePagado;
        $this->nombreDeUsuario=$nombreDeUsuario;
        $this->cantidad=$cantidad;
        $this->precioUnitario=$precioUnitario;
    }

    public function getIdPedido(){
        return $this->idPedido;
    }
    public function getIdProd(){
        return $this->idProducto;
    }

    public function getFechaPagado(){
        return $this->fechaDePagado;
    }

    public function getNombreUsuario(){
        return $this->nombreDeUsuario;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }

    public function setIdPedido($idPedido){
        $this->idPedido = $idPedido;
        return $this;
    }
    
    public function setIdProd($idProducto){
        $this->idProducto = $idProducto;
        return $this;
    }

    public function setFechaPagado($fechaDePagado){
        $this->fechaDePagado = $fechaDePagado;
        return $this;
    }

    public function setNombreUsuario($nombreDeUsuario){
        $this->nombreDeUsuario = $nombreDeUsuario;
        return $this;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
        return $this;
    }

    public function setPrecioUnitario($precioUnitario){
        $this->precioUnitario = $precioUnitario;
        return $this;
    }
}

?>