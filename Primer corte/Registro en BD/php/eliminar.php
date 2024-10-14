<?php
    include("abre.php");

    // Validar si el ID ha sido pasado correctamente
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Mostrar el ID para debug
        echo "ID a eliminar: " . $id . "<br>";

        // Preparar la consulta SQL para eliminar
        $consulta = "DELETE FROM eventos WHERE id = '$id'";
        echo "Consulta SQL: " . $consulta . "<br>";

        // Ejecutar la consulta
        if ($conexion->query($consulta) === TRUE) {
            // Redirigir a la página mostrar.php si la eliminación fue exitosa
            header("Location: ../mostrar.php");
        } else {
            // Mostrar un mensaje de error si hubo problemas al ejecutar la consulta
            echo "Error al eliminar el registro: " . $conexion->error;
        }
    } else {
        echo "No se ha pasado ningún ID válido.";
    }

    // Cerrar la conexión
    $conexion->close();
?>
