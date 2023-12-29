<!--CARRITO-->
<div class="carrito-main">
    <?php
    if (!empty($_SESSION['selectedProd'])) : ?>
        <div class="">
            <div class="table-prods">
                <table class="tbl-compra">
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
                                                <img src="../assets/icons/delProdIcon.png" alt="borrar producto">
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <img class="tbl-imgProd" src="../assets/images/<?= $lineaPedido['producto']->getImagenProd(); ?>" alt="producto">
                                    </td>
                                    <td class="tbl-nombreProd"><?= $lineaPedido['producto']->getNombreProd();
                                                                ?>
                                    </td>
                                    <td class="tbl-precioProd"><?= $lineaPedido['producto']->getPrecioProd() . "€";
                                                                ?>
                                    </td>
                                    <td><?= $lineaPedido['cantidad'];
                                        ?>
                                    </td>
                                    <td><?= $lineaPedido['producto']->getPrecioProd() * $lineaPedido['cantidad'] . "€";
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                </table>
            </div>
            <form action="?controller=Producto&action=pedidoPagado" method="post">
                <?php $postvalue = base64_encode(serialize($_SESSION['selectedProd'])); ?>
                <input type="hidden" name="pedido" value="<?= $postvalue ?>">
                <button type="submit">Pagar pedido</button>
            </form>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php else : ?>

    <div class="elements-carrito">
        <div class="elements-cont">
            <div class="carrito-vacio">
                <p>El carrito está vacío.</p>
            </div>
            <form action="<?= '?controller=' ?>" method="post">
                <button class="btn-home">Volver al menú</button>
            </form>
            <p class="info-text">Atención: Si se cancela la reserva en menos de 10
                días de antelación, el importe de la reserva se perderá.</p>
        </div>
    </div>
<?php endif; ?>

<!--SIDEBAR-->
<aside class="lateral-info">
    <div class="buscador">
        <h3>BUSCAR</h3>
        <form action="">
            <input class="buscador-txt" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn-search" type="submit"><img src="../assets/icons/lupa.png" alt="buscar"></button>
        </form>
    </div>
</aside>
</div>