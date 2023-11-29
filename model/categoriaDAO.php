<?php
require_once('../config/database.php');

class categoriaDAO{
    //Obtención de todas las categorias en un array
    public static function getAllCat(){
        $con = database::connect();
        $categorias = array();

        $sql = "SELECT * FROM categorias";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($idCat, $nombreCat);

        while ($stmt->fetch()) {
            $categoria = new stdClass();
            $categoria->idCategoria = $idCat;
            $categoria->nombreCategoria = $nombreCat;
            $categorias[] = $categoria;
        }

        $stmt->close();
        $con->close();

        return $categorias;
    }

    //Select de categoria mediante su ID
    public static function selectCat($idCat){
        $con = database::connect();

        $stmt = $con->prepare("SELECT * FROM categorias WHERE IDcategoria=?");
        $stmt->bind_param("i", $idCat);
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    //Inserción de nueva categoria
    public static function insertCat($idCat, $nombreCat){
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO categorias VALUES (?, ?)");
        $stmt->bind_param("is", $idCat, $nombreCat);
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    //Eliminación de categoria
    public static function deleteCat($idCat){
        $con = database::connect();

        $stmt = $con->prepare("DELETE FROM categorias WHERE IDcategoria = ?");
        $stmt->bind_param("i", $idCat);
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    //Actualización de categoria
    public static function updateCat($idCat, $nombreCat){
        $con = database::connect();

        $stmt = $con->prepare("UPDATE categorias SET nombreDeCategoria=? WHERE IDcategoria=?");
        $stmt->bind_param("si", $nombreCat, $idCat);
        
        $stmt->execute();
        $con->close();
    }
}
?>