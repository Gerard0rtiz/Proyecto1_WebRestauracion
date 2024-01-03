<?php
//require '../controller/productoController.php';

//$controller = new productoController();
//$resultado = $controller->index();
//$productos = $resultado['productos'];
//$categorias = $resultado['categorias'];
?>

<!--PRODUCTOS Y FILTRO-->
<div class="elements-prod">
    <div class="section-prod">
        <div class="inner-sect">
            <main class="productos">
                <div class="container">
                    <!--FILTROS-->
                    <div class="filtros">
                        <form class="formSelect" action="" method="post">
                            <select class="selectorProds" name="filtroProductos" id="filtro1">
                                <option value="3">Mostrar 3 productos</option>
                                <option value="6">Mostrar 6 productos</option>
                                <option value="9">Mostrar 9 productos</option>
                            </select>
                            <select class="selectorProds" name="filtroCategoria" id="filtro2">
                                <option value="Entrantes">Entrantes</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="PlatosCombinados">Platos Combinados</option>
                                <option value="Principal">Principal</option>
                            </select>
                        </form>
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
                                <div class="col prod-li">
                                    <img src="../assets/images/<?= $producto->getImagenProd(); ?>" alt="">
                                    <div class="text-btn-prod">
                                        <div class="text-prod">
                                            <h2><?= $producto->getNombreProd(); ?></h2>
                                            <bdi><?= $producto->getPrecioProd(); ?>€</bdi>
                                        </div>
                                    </div>
                                    <form action="<?= '?controller=Producto&action=selection' ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $producto->getIdProd() ?>">
                                        <input type="hidden" name="idcat" value="<?= $producto->getIdCat() ?>">
                                        <button type="submit" class="btn-prod">Comprar</button>
                                    </form>

                                    <?php if ($_SESSION['activeUser'] == "admin") : ?>
                                        <form action="<?= '?controller=Producto&action=deleteProducto' ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $producto->getIdProd() ?>">
                                            <button type="submit" class="btn-delProd">Eliminar producto</button>
                                        </form>
                                        <form action="<?= '?controller=Producto&action=editProductoIndex' ?>" method="post">
                                            <?php $postvalue = base64_encode(serialize($producto)); ?>
                                            <input type="hidden" name="productoObj" value="<?= $postvalue ?>">
                                            <button type="submit" class="btn-editProd">Editar producto</button>
                                        </form>
                                    <?php endif; ?>
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
        <div>
            <h3>CATEGORIAS</h3>
            <?php
            foreach ($categorias as $categoria) :
                echo "<p>" . $categoria->nombreCategoria . "</p>";
            endforeach;
            ?>
            <h3 class="destacadosProd">DESTACADOS</h3>
        </div>
    </aside>
</div>