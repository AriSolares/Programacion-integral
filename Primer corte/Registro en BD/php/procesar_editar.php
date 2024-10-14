<?php
    include("abre.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['fecha'];
        $tipoevent = $_POST['tipoevent'];
        $cantidadinvit = $_POST['cantidadinvit'];
        $cotizacion = $_POST['cotizacion'];
        $comentarios = $_POST['comentarios'];

        // Actualización del evento
        $consulta = "UPDATE eventos SET nombre = '$nombre', apellido = '$apellido', fecha = '$fecha', tipoevent = '$tipoevent', 
                     cantidadinvit = '$cantidadinvit', cotizacion = '$cotizacion', comentarios = '$comentarios' 
                     WHERE id = '$id'";

        if ($conexion->query($consulta) === TRUE) {
            // Redirigir a mostrar.php
            header("Location: ../mostrar.php");
        } else {
            echo "Error al actualizar el evento: " . $conexion->error;
        }
    }

    // Cerrar la conexión
    $conexion->close();
?>
