<!DOCTYPE html PUBLIC>
<html>

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
<div id="login">
    <?php
        if(isset($_GET['errorCode'])){
            if($_GET['errorCode'] == "noUser"){
                //PULIR MENSAJE DE ERROR
                echo "<h4>USUARIO INCORRECTO</h4>";
            }
            if($_GET['errorCode'] == "noPwd"){
                echo "<h4>CONTRASEÑA INCORRECTA</h4>";
            }
        }
    ?>
    <form name='form-login' action="<?= '/index.php?controller=Producto&action=checkUser' ?>" method="post">

        <input name="user" class="inp-log" type="text" id="user" placeholder="Usuario">
        <input name="pwd" class="inp-log" type="password" id="pass" placeholder="Contraseña">

        <input class="inp-log" type="submit" value="Login">

    </form>
</div>

</html>