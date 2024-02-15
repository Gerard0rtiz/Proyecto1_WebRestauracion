<?php
class database{
    public static function connect($host='localhost', $user='gerardAdmin', $pwd='AdminGerard123', $db='bbddbarrestaurante'){
        $con = new mysqli($host, $user, $pwd, $db);
        if($con == false){
            die('DATABASE ERROR');
        } else{
            return $con;
        }
    }
}

?>