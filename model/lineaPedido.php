    <?php
    class lineaPedido{
        private $idPedido;
        private $idProducto;
        private $cantidad;
        private $precioUnitario;

        public function __construct($idPedido,$idProducto,$cantidad,$precioUnitario){
            $this->idPedido=$idPedido;
            $this->idProducto=$idProducto;
            $this->cantidad=$cantidad;
            $this->precioUnitario=$precioUnitario;
        }

        public function getIdPedido(){
            return $this->idPedido;
        }
        public function getIdProd(){
            return $this->idProducto;
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