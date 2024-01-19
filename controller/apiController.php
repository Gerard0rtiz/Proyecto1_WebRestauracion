<?php
require_once 'model/productoDAO.php';
require_once 'model/categoriaDAO.php';

class apiController{

    public function showReseñas(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $categorias = categoriaDAO::getAllCat();
        $productos = ProductoDAO::getAllProductos();
    
        include_once "view/header.php";
        include_once "view/reviews.php";
        include_once "view/footer.php";
    }
}
?>