    <?php
    ?>
    <h2 class="h2-edit">EDITAR PRODUCTO</h2>
    <form class="form-editProd" action="<?= '/index.php?controller=Producto&action=editProducto' ?>" method="post">
        <?php
        include_once 'model/producto.php';
        $producto = unserialize(base64_decode($_POST['productoObj']));
        ?>

        ID producto: <input style="background-color: #D5D5D5;" type="text" name="id" readonly value="<?= $producto->getIdProd(); ?>"><br>
        Nombre producto: <input type="text" name="nombre" value="<?= $producto->getNombreProd(); ?>"><br>
        Precio producto: <input type="text" name="precio" value="<?= $producto->getPrecioProd(); ?>"><br>
        Nombre de imagen producto: <input type="text" name="imagen" value="<?= $producto->getImagenProd(); ?>"><br>

        Categoría producto: <select name="categoria">
            <?php
            foreach ($categorias as $categoria) {
                if ($categoria->idCategoria == $producto->getIdCat()) {
                    echo '<option selected name="categoria" value=' . $categoria->idCategoria . '>' . $categoria->nombreCategoria . '</option>';
                } else {
                    echo '<option name="categoria" value=' . $categoria->idCategoria . '>' . $categoria->nombreCategoria . '</option>';
                }
            }
            ?>
        </select><br>

        <button type="submit">ACTUALIZAR</button>
    </form>