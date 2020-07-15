<?php
include("conexion.php");

$nom_mat = $_POST['nom_mat'];
$nota = $_POST['nota'];

session_start();
$ci = $_SESSION['ci'];
$nom_comp = $_SESSION['nombre_completo'];

//PARA OBTENER LA IMAGEN DEL USUARIO ACTUAL
$query = "INSERT INTO materia(ci, nom_comp, nota, nom_mat) VALUES ('$ci','$nom_comp','$nota','$nom_mat')";
$response = mysqli_query($conexion, $query);

header('Location: login.php');

// if (!isset($ci) && !isset($pass)) {
//     echo "<script>alert('El usuario o contraseña no coinciden...');</script>";
// }

// session_start();
// $_SESSION['ci'] = $ci;
// //https://jsfiddle.net/mfX57/2149/
// // PARA OBTENER LA IMAGEN DEL USUARIO ACTUAL
// $sqlu = "SELECT * FROM usuario WHERE ci='$ci'";
// $result = $conexion->query($sqlu);
// $fila = mysqli_fetch_row($result);