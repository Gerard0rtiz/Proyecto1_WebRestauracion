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
                    <div class="list-menu">
                        <ul>
                            <li><a href="../index.php?controller=">Inicio</a></li>
                            <li><a href="../index.php?controller=Producto">Productos</a></li>
                            <li>
                                <a href="../index.php?controller=Producto&action=compra">
                                    Finalizar compra
                                    <?php 
                                    if (session_status() == PHP_SESSION_NONE) {
                                        session_start();
                                    }
                                    if (isset($_SESSION['selectedProd'])) {
                                        if(count($_SESSION['selectedProd']) > 0){
                                            echo "(" . count($_SESSION['selectedProd']) . ")";
                                        }
                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>