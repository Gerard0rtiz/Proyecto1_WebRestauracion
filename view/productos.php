<!--PRODUCTOS Y FILTRO-->
<div class="super-elements-prod">
    <div class="elements-prod">
        <div class="section-prod">
            <div class="inner-sect">
                <main class="productos">
                    <div class="container">
                        <!--FILTROS-->
                        <div class="filtros">
                            <input type="checkbox" class="chk-prod" value="1">Entrantes
                            <input type="checkbox" class="chk-prod" value="2">Platos Combinados
                            <input type="checkbox" class="chk-prod" value="3">Principal
                            <input type="checkbox" class="chk-prod" value="4">Bebidas
                            <?php if ($_SESSION['activeUser'] == "admin") : ?>
                                <form action="<?= '?controller=Producto&action=addProductoIndex' ?>" method="post">
                                    <button type="submit" class="btn-addProd">Nuevo producto</button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <!--PRODUCTOS-->
                        <?php $cont = 0; ?>
                        <div class="row">
                            <?php if (isset($productos) && is_array($productos)) : ?>
                                <?php foreach ($productos as $producto) : ?>
                                    <div data-categoria="<?=$producto->getIdCat()?>" class="col prod-li">
                                        <img src="../assets/images/<?= $producto->getImagenProd(); ?>" alt="">
                                        <div class="text-btn-prod">
                                            <div class="text-prod">
                                                <h2><?= $producto->getNombreProd(); ?></h2>
                                                <bdi><?= $producto->getPrecioProd(); ?>€</bdi>
                                            </div>
                                        </div>
                                        <div class="btn-productos">
                                            <form action="<?= '?controller=Producto&action=selection' ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $producto->getIdProd() ?>">
                                                <input type="hidden" name="idcat" value="<?= $producto->getIdCat() ?>">
                                                <button type="submit" class="btn-prod">Comprar</button>
                                            </form>
                                            <div class="btn-admins">
                                                <?php if ($_SESSION['activeUser'] == "admin") : ?>
                                                    <form action="<?= '?controller=Producto&action=editProductoIndex' ?>" method="post">
                                                        <?php $postvalue = base64_encode(serialize($producto)); ?>
                                                        <input type="hidden" name="productoObj" value="<?= $postvalue ?>">
                                                        <button type="submit" class="btn-editProd"><img src="/assets/icons/editar.png" alt="editarProducto"></button>
                                                    </form>
                                                    <form action="<?= '?controller=Producto&action=deleteProducto' ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $producto->getIdProd() ?>">
                                                        <button type="submit" class="btn-delProd"><img src="/assets/icons/papelera.png" alt="eliminarProducto"></button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $cont++;
                                    if ($cont % 3 == 0 && $cont != 0) {
                                        echo '</div><div class="row">';
                                    }
                                    ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No hay productos disponibles.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!--SIDEBAR-->
        <aside class="lateral-sb">
            <div class="cat-dest-prods">
                <h3>CATEGORIAS</h3>
                <?php
                foreach ($categorias as $categoria) :
                    echo "<p>" . $categoria->nombreCategoria . "</p>";
                endforeach;
                ?>
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
<script src="model/filtrosProductos.js"></script>