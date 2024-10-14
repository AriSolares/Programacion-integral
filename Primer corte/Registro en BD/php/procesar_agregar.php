<?php
    include("abre.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['fecha'];
        $tipoevent = $_POST['tipoevent'];
        $cantidadinvit = $_POST['cantidadinvit'];
        $cotizacion = $_POST['cotizacion'];
        $comentarios = $_POST['comentarios'];

        // Inserción de nuevo evento
        $consulta = "INSERT INTO eventos (nombre, apellido, fecha, tipoevent, cantidadinvit, cotizacion, comentarios) 
                     VALUES ('$nombre', '$apellido', '$fecha', '$tipoevent', '$cantidadinvit', '$cotizacion', '$comentarios')";

        if ($conexion->query($consulta) === TRUE) {
            // Redirigir a mostrar.php
            header("Location: ../mostrar.php");
        } else {
            echo "Error al agregar el evento: " . $conexion->error;
        }
    }

    // Cerrar la conexión
    $conexion->close();
?>
