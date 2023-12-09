<?php
require_once 'model/productoDAO.php';
require_once 'model/categoriaDAO.php';

class ProductoController
{
    public function index()
    {
        $productos = ProductoDAO::getAllProductos();
        include_once "view/header.php";
        include_once "view/productos.php";
        include_once "view/footer.php";
    }

    public function selection()
    {

        // Obtener valor de IDprod desde el formulario
        if (isset($_POST['id'])) {
            $idProducto = $_POST['id'];

            // Iniciar la sesión si no está iniciada
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Verificar si array ya existe en la sesión
            if (!isset($_SESSION['selectedProd'])) {
                $_SESSION['selectedProd'] = array();
            }

            // Agregar ID de producto al array
            $_SESSION['selectedProd'][] = $idProducto;
            header("Location:index.php?controller=Producto");

            exit;
        }
    }
}
