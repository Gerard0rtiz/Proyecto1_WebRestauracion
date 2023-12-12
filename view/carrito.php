<!--CARRITO-->
<table class="tbl-compra" style="margin-top: 100px;">
    <tr>
        <th></th>
        <th></th>
        <th>PRODUCTO</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th>SUBTOTAL</th>
    </tr>
    <?php if (isset($_SESSION['selectedProd'])) : ?>
        <?php if (count($_SESSION['selectedProd']) > 0) : ?>
            <?php
            $lineaPedido = array('producto', 'cantidad');
            foreach ($_SESSION['selectedProd'] as $lineaPedido) : ?>
                <tr>
                    <td>
                        <form action="<?= '?controller=Producto&action=delete' ?>" method="post">
                            <input type="hidden" name="id" value="<?= $lineaPedido['producto']->getIdProd() ?>">
                            <button class="btnDel" type="submit">
                                <img width="30px" height="30px" src="../assets/icons/delProdIcon.png" alt="borrar producto">
                            </button>
                        </form>
                    </td>
                    <td>
                        <img width="100px" height="100px" src="../assets/images/<?= $lineaPedido['producto']->getImagenProd(); ?>" alt="producto">
                    </td>
                    <td><?= $lineaPedido['producto']->getNombreProd();
                        ?>
                    </td>
                    <td><?= $lineaPedido['producto']->getPrecioProd()."€";
                        ?>
                    </td>
                    <td><?= $lineaPedido['cantidad'];
                        ?>
                    </td>
                    <td><?= $lineaPedido['producto']->getPrecioProd() * $lineaPedido['cantidad']."€";
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
</table>
<?php if (isset($_SESSION['selectedProd'])) : ?>
<form action="?controller=Producto&action=pedidoPagado" method="post">
    <?php $postvalue = base64_encode(serialize($_SESSION['selectedProd']));?>
    <input type="hidden" name="pedido" value="<?= $postvalue ?>">
    <button type="submit">Pagar pedido</button>
</form>
<?php endif; ?>