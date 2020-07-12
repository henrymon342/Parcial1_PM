<?php

$action = (isset($_POST['action'])) ? $_POST['action'] : "";

include("../conexion/conexion.php");

print_r($_POST);


$ci = $_POST['ci'];
$pass = $_POST['pass'];


$sentencia = $pdo->prepare("SELECT * FROM `USUARIO`");
$sentencia->execute();
$listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

print_r($listaUsuarios);

foreach ($listaUsuarios as &$valor) {
    if ($valor['ci'] == $ci) {
        
    }
}
