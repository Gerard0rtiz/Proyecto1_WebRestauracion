<div class="div-infoPedido">
    <div class="div-Pedido">
        <h1>Aquí encontrará información adicional de su pedido:</h1>
        <p>Fecha del pago del pedido: <?= $pedido->getFechaPagado() ?></p>
        <p>Total de la compra: <?= $pedido->getTotalPedido() ?>€</p>
        <p>Descuento monetario por puntos: <?= $pedido->getDescuentoPuntos() ?>€</p>
        <p>Incremento por propina: <?= $pedido->getPropina() ?>€</p>
    </div>
    <div class="div-productos">
    <table>
        <thead>
            <tr>
                <th>Productos</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lineas_pedidos as $linea_pedido) {
                $producto = ProductoDAO::selectProd($linea_pedido->getIdProd());
                
                echo "<tr>";
                echo "<td>{$producto->getNombreProd()}</td>";
                echo "<td>{$linea_pedido->getCantidad()}</td>";
                echo "<td>{$linea_pedido->getPrecioUnitario()}€</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>