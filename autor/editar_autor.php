<?php 

include('../conexion/conexion.php');

$conexion = conectar();

// Verificar si el ID del autor a editar está presente en la URL
if (!isset($_GET['id'])) {
    header("Location: autor.php");
    exit();
}

// Obtener el ID del autor a editar
$autor_id = intval($_GET['id']);

// Obtener los datos del autor a editar
$query = $conexion->prepare("SELECT * FROM autor WHERE autor_id = ?");
$query->bind_param("i", $autor_id);
$query->execute();
$resultado = $query->get_result();

// Verificar si se encontró un autor con el ID especificado
if ($resultado->num_rows == 0) {
    header("Location: autor.php");
    exit();
}

$autor = $resultado->fetch_assoc();

desconectar($conexion);


///tuve probrlemas al agregar el estilo boostrao
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar autor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-cdjhD3gUas1AlrCr/Kvq9JwZkQHBD48Qhza+mKpKJS8L9hM+R2ZxZ/vhtRdyjIHnEiKyhW3YMLiMoyu2qR4Pbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>Editar autor</h1>
        <form action="actualizar_autor.php" method="POST">
            <input type="hidden" name="autor_id" value="<?php echo $autor['autor_id']; ?>">
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" name="nombres" class="form-control" value="<?php echo $autor['nombres']; ?>">
            </div>
            <div class="mb-3">
                <label for="ape_paterno" class="form-label">Apellido paterno:</label>
                <input type="text" name="ape_paterno" class="form-control" value="<?php echo $autor['ape_paterno']; ?>">
            </div>
            <div class="mb-3">
                <label for="ape_materno" class="form-label">Apellido materno:</label>
                <input type="text" name="ape_materno" class="form-control" value="<?php echo $autor['ape_materno']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>

    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-GdG9xk8uN2CrvAnmvkH4cGXYz6+3amXUzr1w+y5oFKJGxV4nb6Q1QRvOFNqO4n4"></script>
</html>
