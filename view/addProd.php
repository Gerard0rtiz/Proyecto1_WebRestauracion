<?php
    ?>
    <h2 class="h2-add">AÑADIR PRODUCTO</h2>
    <form class="form-addProd" action="<?= '/index.php?controller=Producto&action=addProducto' ?>" method="post">
        <?php
        include_once 'model/producto.php';
        ?>
        Código producto: <input type="number" name="id"><br>
        Nombre producto: <input type="text" name="nombre"><br>
        Precio producto: <input type="text" name="precio"><br>
        Nombre de imagen producto: <input type="text" name="imagen"><br>

        Categoría producto: <select name="categoria">
            <?php
            foreach ($categorias as $categoria) {
                echo '<option name="categoria" value=' . $categoria->idCategoria . '>' . $categoria->nombreCategoria . '</option>';
            }
            ?>
        </select><br>

        <button type="submit">AÑADIR</button>
    </form>