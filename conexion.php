<?php
$conexion = mysqli_connect(
    'localhost',
    'henrymon',
    '1234',
    'KARDEX'
);

if (isset($conexion)) {
    echo 'DB is connected...';
}
