<?php 

include('../conexion/conexion.php');

$conexion = conectar();

//consulta a la base de datos
$query = $conexion->prepare("SELECT autor_id, nombres, ape_paterno, ape_materno FROM autor");
$query->execute();
$resultado = $query->get_result();

desconectar($conexion);

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Autores</h1>
        <a href="agregar.html" class="btn btn-primary mb-3">Agregar autor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>apellido paterno</th>
                    <th>apellido materno</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($autor = $resultado->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'. $autor['autor_id'] . '</td>';
                    echo '<td>'. $autor['nombres'] . '</td>';
                    echo '<td>'. $autor['ape_paterno'] . '</td>';
                    echo '<td>'. $autor['ape_materno'] . '</td>';                
                    echo '<td><a href="editar_autor.php?id='. $autor['autor_id'] .'" class="btn btn-primary">Editar</a> | <a href="eliminar_autor.php" class="btn btn-danger">Eliminar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>

