<?php
require_once('config/database.php');
require_once('model/usuario.php');
class UsuarioDAO
{
    public static function getAllUsers()
    {
        $con = database::connect();
        $usuarios = [];

        $sql = "SELECT * FROM usuarios";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($nombreUser, $email, $nombre, $pwd, $puntos);

        while ($stmt->fetch()) {
            $usuario = new Usuario($nombreUser, $email, $nombre, $pwd, $puntos);
            $usuarios[] = $usuario;
        }

        $stmt->close();
        $con->close();

        return $usuarios;
    }

    public static function getPuntosByUser($user) {
        $con = database::connect();
        $stmt = $con->prepare("SELECT puntos FROM usuarios WHERE nombreDeUsuario=?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($puntos);
        $stmt->fetch();
        $stmt->close();
        $con->close();
        return $puntos;
    }
    

    public static function checkUserPasswd($user, $pwd)
    {
        $con = database::connect();

        $stmt = $con->prepare("SELECT * FROM usuarios WHERE nombreDeUsuario=?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($user, $email, $nombre, $password, $puntos);
        if ($stmt->fetch()) {
            $usuario = new Usuario($user, $email, $nombre, $password, $puntos);

            if ($pwd == $usuario->getPassword()) {
                return "okUser";
            } else {
                return "noPwd";
            }
        } else {
            return "noUser";
        }
        $stmt->close();
        $con->close();
    }

    public static function updatePuntos($nombreUsuario, $nuevosPuntos) {
        $con = database::connect();
    
        $stmt = $con->prepare("UPDATE usuarios SET puntos = ? WHERE nombreDeUsuario = ?");
        $stmt->bind_param("is", $nuevosPuntos, $nombreUsuario);
        $stmt->execute();
        
        $stmt->close();
        $con->close();
    }

     //Actualizar saldo de puntos  con puntos ganados
     public static function actualizarSaldoPuntos($nombreUsuario, $nuevosPuntos)
     {
        $con = database::connect();
    
        $stmt = $con->prepare("UPDATE usuarios SET puntos = ? WHERE nombreDeUsuario = ?");
        $stmt->bind_param("is", $nuevosPuntos, $nombreUsuario);
        $stmt->execute();
        
        $stmt->close();
        $con->close();
     }
}
