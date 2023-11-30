<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Restaurante Karting Vendrell</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <!--HEADER-->
    <header>
        <div class="hd-black">
            <div class="info-hd-black">
                <p>Reserva en Tel. 977 66 37 76 Horario L-V 10h-14h y 16h-20h S-D 10h-20h</p>
                <img src="../assets/icons/banderas.png" alt="banderas ESP-UK-FRE">
            </div>
        </div>
        <div class="hd-menu">
            <div class="items-menu">
                <a href="../view/index.php"><img src="../assets/images/logoKarting.png" alt="logoKarting"></a>
                <nav class="nav-menu">
                    <div class="list-menu">
                        <ul>
                            <li <?php if (basename($_SERVER['PHP_SELF']) === 'index.php') echo 'class="current"'; ?>><a href="index.php">Inicio</a></li>
                            <li <?php if (basename($_SERVER['PHP_SELF']) === 'productos.php') echo 'class="current"'; ?>><a href="productos.php">Productos</a></li>
                            <li <?php if (basename($_SERVER['PHP_SELF']) === 'carrito.php') echo 'class="current"'; ?>><a href="carrito.php">Finalizar compra</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!--PRODUCTOS-->
    <?php
    require_once('../model/categoriaDAO.php');
    require_once('../model/productoDAO.php');

    //Usar para filtros y sección lateral de página
    //$categorias = categoriaDAO::getAllCat();

    //echo '<pre style="margin-top: 150px;">';
    //print_r($categorias);
    //echo '</pre>';

    ////Usar para mostrar todos los productos
    //$productos = productoDAO::getAllProductos();

    ?>

    <!--PRODUCTOS-->
    <div class="section-prod">
        <div class="inner-sect">
            <main class="productos">
                <div class="container">
                    <div class="row">
                        <div class="col prod-li">
                            <img src="../assets/images/bravas.png" alt="">
                            <div class="text-btn-prod">
                                <div class="text-prod">
                                    <h2>Producto 1</h2>
                                    <bdi>10,00€</bdi>
                                </div>
                            </div>
                            <button class="btn-prod">Añadir Producto</button>
                        </div>
                        <div class="col prod-li">test2</div>
                        <div class="col prod-li">test3</div>
                    </div>
                </div>
            </main>

            <!--SIDEBAR-->
            <aside class="lateral-sb"></aside>
        </div>
    </div>
    <?php
    //echo '<br><br><br><br><br><pre>';
    //print_r($productos);
    //echo '</pre>';

    //Usar esta parte de codigo para el funcionamiento del boton de añadir
    //$imagen = productoDAO::selectProd(3);

    //if ($imagen->num_rows > 0) {
    //    $fila = $imagen->fetch_assoc();
//
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

    <!--FOOTER-->
    <footer>
        <div class="separator-footer">
            <div class="main-footer">
                <img src="../assets/images/logoKarting.png" alt="logo Karting">
                <div class="text-footer">
                    <h3>BAR RESTAURANTE VENDRELL</h3>
                    <p>Ctra. N-340 Km 1.189 <br>43700 El Vendrell <br>Tel. 977 66 37 76</p>
                    <p><strong>Horario</strong></p>
                    <p>Lunes a Viernes <br>10h-22h</p>
                    <p>Sábados y Domingos <br>10h-23h</p>
                </div>
            </div>
        </div>
        <div class="sep2-footer">
            <div class="scnd-footer">
                <span>© Karting Vendrell</span>
                <ul class="lista-footer">
                    <li>Condiciones Generales</li>
                    <li>Política de privacidad</li>
                    <li>Aviso Legal</li>
                    <li>Uso de Cookies</li>
                </ul>
                <ul class="social-media">
                    <li><a href="https://www.facebook.com/karting.vendrell"><img style="width: 5.5px; height: 11.2px;" src="../assets/icons/facebook.png" alt="facebook"></a></li>
                    <li><a href="https://twitter.com/ClubVendrell"><img style="width: 10.13px; height: 11.2px;" src="../assets/icons/twitter.png" alt="twitter"></a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>