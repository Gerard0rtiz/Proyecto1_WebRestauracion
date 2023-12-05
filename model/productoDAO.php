<?php
require_once('../config/database.php');

class productoDAO
{
  //Obtención de todas los productos en un array
  public static function getAllProductos()
  {
    $con = database::connect();
    $producto = array();

    $sql = "SELECT * FROM productos";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($idProd, $imagenProd, $nombreProd, $precioProd, $idCat);

    while ($stmt->fetch()) {
      $producto = new stdClass();
      $producto->idProd = $idProd;
      $producto->imagenProd = $imagenProd;
      $producto->nombreProd = $nombreProd;
      $producto->precioProd = $precioProd;
      $producto->idCategoria = $idCat;
      $productos[] = $producto;
    }

    $stmt->close();
    $con->close();

    return $productos;
  }

  //Select de producto mediante su ID
  public static function selectProd($idProd){
    $con = database::connect();

    $stmt = $con->prepare("SELECT * FROM productos WHERE IDproducto=?");
    $stmt->bind_param("i", $idProd);
    $stmt->execute();
    $result=$stmt->get_result();

    $con->close();
    return $result;
}

  //Inserción de nuevo producto
  public static function insertProduct($idProd, $imagenProd, $nombreProd, $precioProd, $idCat)
  {
    $con = database::connect();

    $stmt = $con->prepare("INSERT INTO productos VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issdi", $idProd, $imagenProd, $nombreProd, $precioProd, $idCat);
    $stmt->execute();
    $result = $stmt->get_result();

    $con->close();
    return $result;
  }

  //Eliminación de producto
  public static function deleteProduct($idProd)
  {
    $con = database::connect();

    $stmt = $con->prepare("DELETE FROM productos WHERE IDproducto = ?");
    $stmt->bind_param("i", $idProd);
    $stmt->execute();
    $result = $stmt->get_result();

    $con->close();
    return $result;
  }

  //Actualización de producto
  public static function updateProduct($imagenProd, $nombreProd, $precioProd, $idCat, $idProd)
  {
    $con = database::connect();

    $stmt = $con->prepare("UPDATE productos SET imagen=?, nombreDeProducto=?, precio=?, IDcategoria=?  WHERE IDproducto=?");
    $stmt->bind_param("ssdii", $imagenProd, $nombreProd, $precioProd, $idCat, $idProd);

    $stmt->execute();
    $con->close();
  }
}
