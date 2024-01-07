<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "config/parameters.php";
include_once 'controller/productoController.php';

if(!isset($_GET['controller'])){
    header('Location:'.$url.'view/login.php');
}else{
    $nombre_controller = $_GET['controller'].'Controller';

    if(class_exists($nombre_controller)){
        $controller = new $nombre_controller();

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = "index";
        }

        if($action != 'index'){
            if($action == 'compra'){
                $_SESSION['activePage']="carrito";
            }
            $controller->$action();
        }else{
            $_SESSION['activePage']="productos";
            $controller->index("");
        }
    }else{
        $_SESSION['activePage'] = "inicio";
        header("Location:view/landing.php");
    }
}

?>