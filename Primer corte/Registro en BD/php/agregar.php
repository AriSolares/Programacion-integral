<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/style.css">

<head>
    <title>Agregar Evento</title>
</head>
<body>
    <header>
        <section id="espacio"></section>
        <section id="banner">Agregar Evento</section>
    </header>

    <center>
        <h2>Nuevo Evento</h2>
        <form action="procesar_agregar.php" method="POST">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" required></td>
                </tr>
                <tr>
                    <td>Apellido:</td>
                    <td><input type="text" name="apellido" required></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><input type="date" name="fecha" required></td>
                </tr>
                <tr>
                    <td>Tipo de Evento:</td>
                    <td><input type="text" name="tipoevent" required></td>
                </tr>
                <tr>
                    <td>Invitados:</td>
                    <td><input type="number" name="cantidadinvit" required></td>
                </tr>
                <tr>
                    <td>Cotización:</td>
                    <td><input type="number" name="cotizacion" required></td>
                </tr>
                <tr>
                    <td>Comentarios:</td>
                    <td><textarea name="comentarios" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Agregar Evento">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
