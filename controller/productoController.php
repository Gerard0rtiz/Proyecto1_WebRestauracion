<?php
require_once '../model/productoDAO.php';

class ProductoController {
    public function index() {
        return ProductoDAO::getAllProductos();
    }
}
?>