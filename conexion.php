<?php
function conectar(){
    $usuario="UVIpChcjd2";
    $contrasenia="O2I8Lsie03";
    $url="remotemysql.com";
    $db="UVIpChcjd2";
    
    $mysqli=new mysqli($url,$usuario,$contrasenia,$db);
    $mysqli->set_charset("utf8");
    
    return $mysqli;
}

?>