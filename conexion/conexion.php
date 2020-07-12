<?php

$servidor = "mysql:dbname=ACADEMICO;host=127.0.0.1";
$usuario = "henrymon";
$password = "1234";

try {
    $pdo = new PDO($servidor, $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    echo "[ BASE DE DATOS CONECTADA... ]";
} catch (\Throwable $th) {
    echo "LA CONEXION A LA BASE DE DATOS HA FALLADO...  ".$e ->getMessage();
}
