
    <?php
    //require '../controller/productoController.php';

    //$controller = new productoController();
    //$resultado = $controller->index();
    //$productos = $resultado['productos'];
    //$categorias = $resultado['categorias'];
    ?>

    <!--PRODUCTOS-->
    <div class="section-prod">
        <div class="inner-sect">
            <main class="productos">
                <div class="container">
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
                                    <form action="<?='?controller=Producto&action=selection'?>" method="post">
                                        <input type="hidden" name="id" value="<?=$producto->getIdProd()?>">
                                        <input type="hidden" name="idcat" value="<?=$producto->getIdCat()?>">
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

            <!--SIDEBAR-->
            <aside class="lateral-sb">
                <?php
                    //foreach ($categorias as $categoria) :
                    //    echo 'ID: ' . $categoria->idCategoria . ', Nombre: ' . $categoria->nombreCategoria . '<br>';
                    //endforeach;
                ?>
            </aside>
        </div>
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
