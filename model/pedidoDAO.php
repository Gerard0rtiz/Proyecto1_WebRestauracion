<?php
class pedidoDAO{
    public static function insertProduct($idPedido, $totalPedido, $descuentoPuntos, $propina, $nombreDeUsuario, $fechaPagado)
    {
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO pedidos VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdddss", $idPedido, $totalPedido, $descuentoPuntos, $propina, $nombreDeUsuario, $fechaPagado);
        $stmt->execute();

        $con->close();
    }
}
