<?php
class lineaPedidoDAO{
    public static function insertProduct($idPedido, $idProducto, $cantidad, $precioUnitario)
    {
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO lineas_pedidos VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siid", $idPedido, $idProducto, $cantidad, $precioUnitario);
        $stmt->execute();

        $con->close();
    }
}
