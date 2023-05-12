<?php 
include("../conexion/conexion.php");

// Obtener el ID del autor a eliminar
$autor_id = $_GET['autor_id'];

// Eliminar el autor de la base de datos
$eliminacion = $conexion->prepare("DELETE FROM autor WHERE autor_id = ?");
$eliminacion->bind_param("i", $autor_id);
$eliminacion->execute();

// Cerrar la conexión a la base de datos
desconectar($conexion);

header("Location: autor.php");
?>
