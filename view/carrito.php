<!--CARRITO-->
<div class="carrito-main">
    <div class="sub-carrito-main">
        <?php
        if (!empty($_SESSION['selectedProd'])) : ?>
            <div class="carritoLleno">
                <div class="table-prods">
                    <table class="tbl-compra">
                        <tr>
                            <th class="tbl-delete"></th>
                            <th class="tbl-img"></th>
                            <th class="tbl-nombreProd">PRODUCTO</th>
                            <th class="tbl-precioProd">PRECIO</th>
                            <th class="tbl-cantidad">CANTIDAD</th>
                            <th class="tbl-subtotal">SUBTOTAL</th>
                        </tr>
                        <?php if (isset($_SESSION['selectedProd'])) : ?>
                            <?php if (count($_SESSION['selectedProd']) > 0) : ?>
                                <?php
                                $lineaPedido = array('producto', 'cantidad');
                                $contProds = 0;
                                $sumaTotal = 0;
                                foreach ($_SESSION['selectedProd'] as $lineaPedido) : ?>
                                    <tr>
                                        <td class="tbl-delete">
                                            <form action="<?= '?controller=Producto&action=delete' ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $lineaPedido['producto']->getIdProd() ?>">
                                                <button class="btnDel" type="submit">
                                                    <img src="../assets/icons/delProdIcon.png" alt="borrar producto">
                                                </button>
                                            </form>
                                        </td>
                                        <td class="tbl-img">
                                            <img class="tbl-imgProd" src="../assets/images/<?= $lineaPedido['producto']->getImagenProd(); ?>" alt="producto">
                                        </td>
                                        <td style="color: #a81010;" class="tbl-nombreProd"><?= $lineaPedido['producto']->getNombreProd();
                                                                                            ?>
                                        </td>
                                        <td class="tbl-precioProd"><?= $lineaPedido['producto']->getPrecioProd() . "€";
                                                                    ?>
                                        </td>
                                        <td class="tbl-cantidad">
                                            <div class="cantidadProducto">
                                                <form action="<?= '?controller=Producto&action=restarProd' ?>" method="post">
                                                    <input type="hidden" name="posicionSelectedProd" value="<?= $contProds ?>">
                                                    <button type="submit" class="restaCantidad">-</button>
                                                </form>

                                                <p class="valorCantidad"><?= $lineaPedido['cantidad']; ?></p>

                                                <form action="<?= '?controller=Producto&action=sumarProd' ?>" method="post">
                                                    <input type="hidden" name="posicionSelectedProd" value="<?= $contProds ?>">
                                                    <button type="submit" class="sumaCantidad">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="tbl-subtotal"><?= $lineaPedido['producto']->getPrecioProd() * $lineaPedido['cantidad'] . "€";
                                                                    ?>
                                        </td>
                                    </tr>
                                <?php $contProds++;
                                    $sumaTotal = $sumaTotal + ($lineaPedido['producto']->getPrecioProd() * $lineaPedido['cantidad']);
                                endforeach; ?>
                    </table>
                </div>
                <div class="tbl-totalCompra">
                    <h2>TOTALES DEL CARRITO</h2>
                    <table class="tbl-total">
                        <tr>
                            <th style="color: #919191;">TOTAL</th>
                            <td style="color: #a81010;"> <?= $sumaTotal . "€" ?></td>
                        </tr>
                    </table>
                </div>
                <form class="finCompra" action="?controller=Producto&action=pedidoPagado" method="post">
                    <?php $postvalue = base64_encode(serialize($_SESSION['selectedProd'])); ?>
                    <input type="hidden" name="pedido" value="<?= $postvalue ?>">
                    <button class="btn-finCompra" type="submit">Finalizar compra</button>
                </form><br><br>
                <p class="info-text">Atención: Si se cancela la reserva en menos de 10
                    días de antelación, el importe de la reserva se perderá.</p>
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
</div>