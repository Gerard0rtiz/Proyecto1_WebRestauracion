<?php
class lineaPedidoDAO{
    public static function insertProduct($idPedido, $idProducto, $fechaDePagado, $nombreDeUsuario, $cantidad, $precioUnitario)
    {
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO lineas_pedidos VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissid", $idPedido, $idProducto, $fechaDePagado, $nombreDeUsuario, $cantidad, $precioUnitario);
        $stmt->execute();

        $con->close();
    }
}
