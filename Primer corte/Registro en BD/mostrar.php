<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">

<head>
    <title>Eventos Registrados</title>
</head>
<body>
    <header>
        <section id="espacio"></section>
        <section id="banner">Eventos Registrados</section>
        <section id="fecha">
            <div id="calendar">
                <p id="calendar-day"></p>
                <p id="calendar-date"></p>
                <p id="calendar-month-year"></p>
            </div>
        </section>
    </header>

    <!-- ------------------------------------------->
    <center>
        <h2>Registro de eventos</h2>
        
        <!-- Botón para agregar un nuevo evento -->
        <a href="php/agregar.php">
            <button type="button">Agregar Nuevo Evento</button>
        </a>
        
        <br><br> <!-- Espacio entre el botón y la tabla -->

        <table border="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha</th>
                    <th>Tipo de Evento</th>
                    <th>Invitados</th>
                    <th>Cotización</th>
                    <th>Comentarios</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("php/abre.php");
                    $consulta = "SELECT * FROM eventos";
                    $resultado = $conexion->query($consulta);
                    $a=1;
                    while($row = $resultado->fetch_assoc()) {
                        ?>
                    <tr>
                        <td><?php echo $row['id'];  ?></td>
                        <td><?php echo $a++;         ?></td>
                        <td><?php echo $row['nombre'];   ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['tipoevent']; ?></td>
                        <td><?php echo $row['cantidadinvit']; ?></td> 
                        <td><?php echo $row['cotizacion']; ?></td> 
                        <td><?php echo $row['comentarios']; ?></td>   
                        <td><a href="php/editar.php?id=<?php echo $row['id']; ?>" id=""><img height="35px" src="img/cam.png" alt="Editarr"></a></td>
                        <td><a href="php/eliminar.php?id=<?php echo $row['id']; ?>" id=""><img height="35px" src="img/borr.png" alt="Eliminar"></a></td>
                    </tr>
                <?php
                    }
                ?>

                <tr>
                    
                </tr>
            </tbody>
        </table>
    </center>

</body>
</html>
