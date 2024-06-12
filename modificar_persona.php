<?php
include "modelo/conexion.php";

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Convertir a entero para evitar inyecciones SQL

    // Preparar la consulta
    if ($sql = $conexion->prepare("SELECT * FROM persona WHERE id_persona = ?")) {
        $sql->bind_param("i", $id);

        // Ejecutar la consulta
        $sql->execute();
        $result = $sql->get_result();

        // Verificar si se obtuvieron resultados
        if ($result && $result->num_rows > 0) {
            $datos = $result->fetch_object();
        } else {
            echo "No se encontró ninguna persona con el ID proporcionado.";
            exit;
        }
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form class="col-4 p-3 m-auto" method="POST">
    <h3 class="text-center text-secondary">Modificar persona</h3>
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <?php
    include "controlador/modificar_persona.php";
    
    ?>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombres:</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($datos->nombre); ?>">
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellidos:</label>
        <input type="text" class="form-control" name="apellido" value="<?php echo htmlspecialchars($datos->apellido); ?>">
    </div>
    <div class="mb-3">
        <label for="dni" class="form-label">DNI:</label>
        <input type="text" class="form-control" name="dni" value="<?php echo htmlspecialchars($datos->dni); ?>">
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo htmlspecialchars($datos->fecha_nac); ?>">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo:</label>
        <input type="email" class="form-control" name="correo" value="<?php echo htmlspecialchars($datos->correo); ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
</form>
</body>
</html>
