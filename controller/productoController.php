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
        if($mensaje == 'okSelection'){
            echo "<div class='mensajeCorrecto'><p>Producto añadido a la cesta correctamente</p></div>";
        }
        if($mensaje == 'okPedido'){
            echo "<div class='mensajeCorrecto'><p>Pedido realizado correctamente</p></div>";
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
                    $_SESSION['selectedProd'][] = array(
                        'producto' => $producto,
                        'cantidad' => 1
                    );
                }
            } else {
                $_SESSION['selectedProd'][] = array(
                    'producto' => $producto,
                    'cantidad' => 1
                );
            }
            header("Location:index.php?controller=Producto&action=okSelection");
        }
    }

    public function okSelection(){
        ProductoController::index('okSelection');
    }

    public function okPedido(){
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
        include_once 'model/producto.php';
        include_once 'model/pedido.php';
        include_once 'model/pedidoDAO.php';

        if (isset($_POST['pedido'])) {
            $pedido = unserialize(base64_decode($_POST['pedido']));
            $idPedido = date("Y-m-d") . "-" . date("H:i:s")."-USERTESTING"; //MODIFICAR USERS
            print_r($pedido);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            foreach($pedido as $lineaPedido){
                PedidoDAO::insertProduct(
                    $idPedido,
                    $lineaPedido['producto']->getIdProd(),
                    date("Y-m-d"),
                    "admin",
                    $lineaPedido['cantidad'],
                    $lineaPedido['producto']->getPrecioProd()
                );
                print_r($lineaPedido);
            }
            //header("Location:index.php?controller=");
        }
    }
}
