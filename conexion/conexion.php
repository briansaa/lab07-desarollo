<?php

function conectar() {
    $conn = mysqli_connect('localhost','root','usbw','lab07');
    return $conn;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}

?>