<?php
    include("abre.php");

    // Validar si el ID del evento ha sido pasado correctamente
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para obtener los datos del evento por su ID
        $consulta = "SELECT * FROM eventos WHERE id = '$id'";
        $resultado = $conexion->query($consulta);
        $evento = $resultado->fetch_assoc();
    } else {
        echo "No se ha pasado ningún ID válido.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/style.css">

<head>
    <title>Editar Evento</title>
</head>
<body>
    <header>
        <section id="espacio"></section>
        <section id="banner">Editar Evento</section>
    </header>

    <center>
        <h2>Editar Evento</h2>
        <form action="procesar_editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" value="<?php echo $evento['nombre']; ?>" required></td>
                </tr>
                <tr>
                    <td>Apellido:</td>
                    <td><input type="text" name="apellido" value="<?php echo $evento['apellido']; ?>" required></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><input type="date" name="fecha" value="<?php echo $evento['fecha']; ?>" required></td>
                </tr>
                <tr>
                    <td>Tipo de Evento:</td>
                    <td><input type="text" name="tipoevent" value="<?php echo $evento['tipoevent']; ?>" required></td>
                </tr>
                <tr>
                    <td>Invitados:</td>
                    <td><input type="number" name="cantidadinvit" value="<?php echo $evento['cantidadinvit']; ?>" required></td>
                </tr>
                <tr>
                    <td>Cotización:</td>
                    <td><input type="number" name="cotizacion" value="<?php echo $evento['cotizacion']; ?>" required></td>
                </tr>
                <tr>
                    <td>Comentarios:</td>
                    <td><textarea name="comentarios" required><?php echo $evento['comentarios']; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Actualizar Evento">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
