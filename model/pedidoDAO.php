<?php

include_once "model/pedido.php";

class pedidoDAO{
    public static function insertProduct($idPedido, $totalPedido, $descuentoPuntos, $propina, $nombreDeUsuario, $fechaPagado)
    {
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO pedidos VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdddss", $idPedido, $totalPedido, $descuentoPuntos, $propina, $nombreDeUsuario, $fechaPagado);
        $stmt->execute();

        $con->close();
    }

    public static function getPedidoById($idPedido){
        $con = database::connect();

        $stmt = $con->prepare("SELECT * FROM pedidos WHERE IDpedido=?");
        $stmt->bind_param("s", $idPedido);
        $stmt->execute();
        $stmt->bind_result($idPedido, $totalPedido, $descuentoPuntos, $propina, $username, $fechaPagado);
        $stmt->fetch();
        $pedido = new Pedido($idPedido, $totalPedido, $descuentoPuntos, $propina, $username, $fechaPagado);

        $stmt->close();
        $con->close();
        return $pedido;
    } 
}
