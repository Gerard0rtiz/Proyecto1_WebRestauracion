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
                                    <?php $contProds++;
                                    $sumaTotal = $sumaTotal + ($lineaPedido['producto']->getPrecioProd() * $lineaPedido['cantidad']);
                                endforeach; ?>
                    </table>
                    <table class="tbl-puntos">
                        <tr class="row tr-tbl-puntos">
                            <td class="col-4">
                                <input name="pts-user" type="number" min="0" oninput="limitarPuntosMaximos()" id="ptsInput">
                            </td>
                            <td class="col-4">
                                <button name="btn-pts" onclick="canjearPuntos()">Canjear puntos</button>
                            </td>
                            <td class="col-4 pts-dispo">
                                <p></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="propinas">
                    <p class="info-text">Por favor, selecciona el porcentaje de propina que quieras dar (valor predeterminado = 3%)</p>
                    <input type="range" id="porcentaje" name="porcentaje" min="0" max="100" value="3">

                    <p>Porcentaje de propina seleccionado: <span id="valorPorcentaje">3</span>%</p>

                    <button class="btn-noPropina" onclick="omitirPropina()">No dar propina</button><br>
                </div>

                <div class="tbl-totalCompra">
                    <h2>TOTALES DEL CARRITO</h2>
                    <table class="tbl-total">
                        <tr>
                            <th style="color: #919191;">SUBTOTAL</th>
                            <td id="subtotal" style="color: #a81010;"> <?= $sumaTotal . "€" ?></td>
                        </tr>
                        <tr>
                            <th style="color: #919191;">DESCUENTO POR PUNTOS</th>
                            <td id="valor-descPuntos" style="color: #a81010;"></td>
                        </tr>
                        <tr>
                            <th style="color: #919191;">INCREMENTO POR PROPINA</th>
                            <td id="incre-prop" style="color: #a81010;"></td>
                        </tr>
                        <tr>
                            <th style="color: #919191;">TOTAL</th>
                            <td id="sumaTotal" style="color: #a81010;"> <?= $sumaTotal . "€" ?></td>
                        </tr>
                    </table><br>
                </div>

                <div class="puntos-obtenidos">
                    <p></p>
                </div>

                <form class="finCompra" action="?controller=Producto&action=pedidoPagado" method="post">
                    <?php $postvalue = base64_encode(serialize($_SESSION['selectedProd'])); ?>
                    <input type="hidden" name="pedido" value="<?= $postvalue ?>">
                    <input type="hidden" id="valorPropina" name="valorPropina">
                    <input type="hidden" id="descuentoPorPuntos" name="descuentoPorPuntos">
                    <input type="hidden" id="puntosGanados" name="puntosGanados">
                    <input type="hidden" id="puntosCanjeadosInput" name="puntosGastados">
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
    <div class="dest-sidebar">
        <h3 class="destacadosProd">DESTACADO</h3>
        <div>
            <ul class="ul-destacados">
                <li class="li-destacados">
                    <div class="textImg-destacados">
                        <p class="txt-dest">Cerveza de barril 1L</p>
                        <img src="/assets/images/cerveza.png" alt="cerveza">
                    </div>
                    <p>4.99€</p>
                </li>
                <li class="li-destacados">
                    <div class="textImg-destacados">
                        <p class="txt-dest">Pizza con tomate frito y mozarella</p>
                        <img src="/assets/images/pizza.png" alt="pizza">
                    </div>
                    <p>8.99€</p>
                </li>
                <li class="li-destacados">
                    <div class="textImg-destacados">
                        <p class="txt-dest">Calamares rebozados con rodajas de limón</p>
                        <img src="/assets/images/calamares.png" alt="calamares">
                    </div>
                    <p>5.99€</p>
                </li>
            </ul>
        </div>
    </div>
</aside>
    </div>
</div>

<script src="model\puntos-propina.js"></script>