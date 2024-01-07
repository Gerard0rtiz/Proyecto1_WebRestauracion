<?php
require_once 'model/productoDAO.php';
require_once 'model/categoriaDAO.php';

class ProductoController
{
    public function index($mensaje)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $productos = ProductoDAO::getAllProductos();
        $categorias = categoriaDAO::getAllCat();
        include_once "view/header.php";
        if ($mensaje == 'okSelection') {
            echo "<div class='mensajeCorrecto'><p>Producto añadido a la cesta correctamente</p></div>";
        }
        if ($mensaje == 'okPedido') {
            $prodsPedido = unserialize($_COOKIE['lastPedidoProds']);
            echo "<div class='mensajeCorrecto'>
                    <p>Pedido realizado correctamente</p><br>
                    <p>En su anterior pedido se gastó: " . $_COOKIE['lastPedidoTotal'] . "€</p><br>
                    <p>Productos del anterior pedido: <br>";
        
            foreach ($prodsPedido as $lineaPedido) {
                echo "-" . $lineaPedido['producto']->getNombreProd() . "<br>";
            }
            echo "</p></div>";
        }
        include_once "view/productos.php";
        include_once "view/footer.php";
    }

    public function selection()
    {

        //Obtener valor de IDprod desde el formulario
        if (isset($_POST['id'])) {
            $idProducto = $_POST['id'];

            //Iniciar sesión si no está iniciada
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            //Verificar si array ya existe en la sesión
            if (!isset($_SESSION['selectedProd'])) {
                $_SESSION['selectedProd'] = array();
            }

            $producto = ProductoDAO::selectProd($idProducto);

            //Agregar objeto producto al array
            $lineaPedido = array('producto', 'cantidad');
            $cont = 0;

            if (count($_SESSION['selectedProd']) > 0) {
                foreach ($_SESSION['selectedProd'] as $key => $lineaPedido) {
                    if ($lineaPedido['producto']->getIdProd() != $idProducto) {
                        $encontrado = false;
                    } else {
                        $lineaPedido['cantidad']++;
                        $_SESSION['selectedProd'][$key] = $lineaPedido;
                        $encontrado = true;
                        break;
                    }
                }

                if ($encontrado == false) {
                    $cont++;
                    $_SESSION['selectedProd'][] = array(
                        'producto' => $producto,
                        'cantidad' => 1
                    );
                }
            } else {
                $cont++;
                $_SESSION['selectedProd'][] = array(
                    'producto' => $producto,
                    'cantidad' => 1
                );
            }
            header("Location:index.php?controller=Producto&action=okSelection");
        }
    }

    public function sumarProd()
    {
        if (isset($_POST['posicionSelectedProd'])) {
            $posicionProducto = $_POST['posicionSelectedProd'];
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['selectedProd'][$posicionProducto]['cantidad']++;

            header("Location:index.php?controller=Producto&action=compra");
        }
    }

    public function restarProd()
    {
        if (isset($_POST['posicionSelectedProd'])) {
            $posicionProducto = $_POST['posicionSelectedProd'];
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['selectedProd'][$posicionProducto]['cantidad']--;
            if ($_SESSION['selectedProd'][$posicionProducto]['cantidad'] == 0) {
                unset($_SESSION['selectedProd'][$posicionProducto]);
                $_SESSION['selectedProd'] = array_values($_SESSION['selectedProd']);
            }

            header("Location:index.php?controller=Producto&action=compra");
        }
    }

    public function okSelection()
    {
        ProductoController::index('okSelection');
    }

    public function okPedido()
    {
        ProductoController::index('okPedido');
    }

    public function compra()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include_once 'view/header.php';
        include_once 'view/carrito.php';
        include_once 'view/footer.php';
    }

    public function delete()
    {
        if (isset($_POST['id'])) {
            $idProducto = $_POST['id'];

            //Iniciar sesión si no está iniciada
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            //Buscar posición de elemento con ID específico y eliminarlo
            $lineaPedido = array('producto', 'cantidad');

            foreach ($_SESSION['selectedProd'] as $key => $lineaPedido) {
                if ($lineaPedido['producto']->getIdProd() == $idProducto) {
                    unset($_SESSION['selectedProd'][$key]);
                    $_SESSION['selectedProd'] = array_values($_SESSION['selectedProd']);
                    break;
                }
            }
            header("Location:index.php?controller=Producto&action=compra");
        }
    }

    public function pedidoPagado()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include_once 'model/producto.php';
        include_once 'model/pedido.php';
        include_once 'model/pedidoDAO.php';
        $sumaTotal = 0;

        if (isset($_POST['pedido'])) {
            $pedido = unserialize(base64_decode($_POST['pedido']));
            $idPedido = date("Y-m-d") . "-" . date("H:i:s") . "-" . $_SESSION['activeUser'];

            foreach ($pedido as $lineaPedido) {
                PedidoDAO::insertProduct(
                    $idPedido,
                    $lineaPedido['producto']->getIdProd(),
                    date("Y-m-d"),
                    $_SESSION['activeUser'],
                    $lineaPedido['cantidad'],
                    $lineaPedido['producto']->getPrecioProd()
                );
                $sumaTotal = $sumaTotal + ($lineaPedido['producto']->getPrecioProd() * $lineaPedido['cantidad']);
            }
        }
        setcookie("lastPedidoTotal",  $sumaTotal, time() + 3600);
        setcookie("lastPedidoProds",  base64_decode($_POST['pedido']), time() + 3600);
        unset($_SESSION['selectedProd']);
        header("Location:index.php?controller=Producto");
        header("Location:index.php?controller=Producto&action=okPedido");
        //print_r($_COOKIE['lastPedidoTotal']);
        //echo "<br>";
        //$prodsPedido = unserialize($_COOKIE['lastPedidoProds']);
        //foreach ($prodsPedido as $lineaPedido) {
        //    echo $lineaPedido['producto']->getNombreProd() . "<br>";
        //}
    }

    public function checkUser()
    {
        include_once 'model/usuarioDAO.php';
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];

        $resultado = UsuarioDAO::checkUserPasswd($user, $pwd);

        if ($resultado == "okUser") {
            session_start();
            $_SESSION['activeUser'] = $user;
            $_SESSION['activePage'] = "inicio";
            header("Location:view/landing.php");
        } else {
            header("Location:view/login.php?errorCode=" . $resultado);
        }
    }

    public function deleteProducto()
    {
        if (isset($_POST['id'])) {
            $idProd = $_POST['id'];
            productoDAO::deleteProduct($idProd);
            header("Location:index.php?controller=Producto");
        }
    }

    public function addProducto()
    {
        if (isset($_POST['id'])) {
            $idProd = $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            $categoria = $_POST['categoria'];
            productoDAO::insertProduct($idProd, $imagen, $nombre, $precio, $categoria);
        }
        header("Location:index.php?controller=Producto");
    }

    public function editProducto()
    {
        if (isset($_POST['id'])) {
            $idProd = $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            $categoria = $_POST['categoria'];
            productoDAO::updateProduct($imagen, $nombre, $precio, $categoria, $idProd);
            header("Location:index.php?controller=Producto");
        }
    }

    public function getAllCat()
    {
        $categorias = categoriaDAO::getAllCat();
        return $categorias;
    }

    public function editProductoIndex()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $categorias = categoriaDAO::getAllCat();

        include_once "view/header.php";
        include_once "view/editProd.php";
        include_once "view/footer.php";
    }

    public function addProductoIndex()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $categorias = categoriaDAO::getAllCat();
        $productos = ProductoDAO::getAllProductos();

        include_once "view/header.php";
        include_once "view/addProd.php";
        include_once "view/footer.php";
    }
}