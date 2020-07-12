<?php
if (!isset($_POST["name"]) || !isset($_POST["lastname"]) || !isset($_POST["borndate"]) || !isset($_POST["ci"]) || !isset($_POST["pass"]) || !isset($_POST["color"]) || !isset($_POST["cod_dep"]) || !isset($_POST["photo"])) exit();

include("../conexion/conexion.php");

echo ('conectado');

print_r($_POST);
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$borndate = $_POST["borndate"];
$ci = $_POST["ci"];
$pass = $_POST["pass"];
$color = $_POST["color"];
$cod_dep = $_POST["cod_dep"];
$photo = $_POST["photo"];

$complet = $name . ' ' . $lastname;

$sentencia = $pdo->prepare("INSERT INTO identificador(ci, nom_comp, fecha_nac, cod_dep)
VALUES(:ci, :nom_comp, :fecha_nac, :cod_dep)");

$sentencia->bindParam(':ci', $ci);
$sentencia->bindParam(':nom_comp', $complet);
$sentencia->bindParam(':fecha_nac', $borndate);
$sentencia->bindParam(':cod_dep', $cod_dep);

$sentencia->execute();

$sentencia2 = $pdo->prepare("INSERT INTO usuario(ci, pass, color, photo)
VALUES(:ci, :pass, :color, :photo)");

$sentencia2->bindParam(':ci', $ci);
$sentencia2->bindParam(':pass', $pass);
$sentencia2->bindParam(':color', $color);
$sentencia2->bindParam(':photo', $photo);

$sentencia2->execute();