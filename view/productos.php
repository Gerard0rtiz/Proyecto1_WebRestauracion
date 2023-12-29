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
                                        <button type="submit" class="btn-prod">Añadir Producto</button>
                                    </form>
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
                echo "<p>".$categoria->nombreCategoria."</p>";
            endforeach;
            ?>
            <h3 class="destacadosProd">DESTACADOS</h3>
        </div>
    </aside>
</div>

<?php

//Usar esta parte de codigo para el funcionamiento del boton de añadir
//$imagen = productoDAO::selectProd(3);
//if ($imagen->num_rows > 0) {
//    $fila = $imagen->fetch_assoc();
//    echo "<h2>Información del producto</h2>";
//    echo "<p><strong>ID del producto:</strong> " . $fila['IDproducto'] . "</p>";
//    echo "<p><strong>Nombre del producto:</strong> " . $fila['nombreDeProducto'] . "</p>";
//    echo "<p><strong>Precio del producto:</strong> " . $fila['precio'] . "</p>";
//    echo "<p><strong>Imagen del producto:</strong></p><img src='../assets/images/" . $fila['imagen'] . "' 
//    width='150px' height='100px'>";
//} else {
//    echo "<p>No se encontraron resultados para la categoría con ID 3</p>";
//}
?>