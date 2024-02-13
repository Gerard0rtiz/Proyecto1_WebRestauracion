<?php
include_once "model/lineaPedido.php";

class lineaPedidoDAO{
    public static function insertProduct($idPedido, $idProducto, $cantidad, $precioUnitario)
    {
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO lineas_pedidos VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siid", $idPedido, $idProducto, $cantidad, $precioUnitario);
        $stmt->execute();

        $con->close();
    }

    public static function getlineasPedidoById($idPedido){
        $con = database::connect();
    
        $stmt = $con->prepare("SELECT * FROM lineas_pedidos WHERE IDpedido=?");
        $stmt->bind_param("s", $idPedido);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $lineas_pedidos = array();
    
        while ($row = $result->fetch_assoc()) {
            $idPedido = $row['IDpedido'];
            $idProducto = $row['IDproducto'];
            $cantidad = $row['cantidad'];
            $precioUnitario = $row['precioUnitario'];
    
            $linea_pedido = new lineaPedido($idPedido, $idProducto, $cantidad, $precioUnitario);
            $lineas_pedidos[] = $linea_pedido;
        }
    
        $stmt->close();
        $con->close();
    
        return $lineas_pedidos;
    }
}
