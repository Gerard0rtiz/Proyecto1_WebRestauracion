<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Restaurante Karting Vendrell</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, 
    maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <header>
        <div class="hd-black">
            <div class="info-hd-black">
                <p>Reserva en Tel. 977 66 37 76 Horario L-V 10h-14h y 16h-20h S-D 10h-20h</p>
                <img src="../assets/icons/banderas.png" alt="banderas ESP-UK-FRE">
            </div>
        </div>
        <div class="hd-menu">
            <div class="items-menu">
                <a href="../index.php?controller="><img src="../assets/images/logoKarting.png" alt="logoKarting"></a>
                <nav class="nav-menu">
                    <label id="icon-menu" for="menu_hamburguesa">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                        </svg>
                    </label>
                    <input type="checkbox" class="menu_hamburguesa" id="menu_hamburguesa">
                    <div class="list-menu">
                        <ul>
                            <li <?php if($_SESSION['activePage']=="inicio" ){ echo "class='current'";}?>><a href="../index.php?controller=">Inicio</a></li>
                            <li <?php if($_SESSION['activePage']=="productos" ){ echo "class='current'";}?>><a href="../index.php?controller=Producto">Productos</a></li>
                            <li <?php if($_SESSION['activePage']=="carrito" ){ echo "class='current'";}?>>
                                <a href="../index.php?controller=Producto&action=compra">
                                    Finalizar compra
                                    <?php
                                    if (isset($_SESSION['selectedProd'])) {
                                        if (count($_SESSION['selectedProd']) > 0) {
                                            echo "(" . count($_SESSION['selectedProd']) . ")";
                                        }
                                    }
                                    ?>
                                </a>
                            </li>
                            <li>
                                <p class="username">
                                    <?php
                                    if (isset($_SESSION['activeUser'])) {
                                        echo "Usuario: " . $_SESSION['activeUser'];
                                    }
                                    ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>