<?php
$conexion = mysqli_connect(
    'localhost',
    'henrymon',
    '1234',
    'ACADEMICO'
);

if (isset($conexion)) {
    echo 'DB is connected...';
}
