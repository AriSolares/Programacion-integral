<?php
    include("abre.php");
    $Nombre     = $_POST['Nombre'];
    $Apellidos  = $_POST['Apellidos'];
    $Calle      = $_POST['Calle'];

    $consulta = "INSERT INTO clientes(Nombre, Apellidos, Calle) VALUES ('$Nombre','$Apellidos','$Calle')";

    if($conexion->query($consulta) === TRUE){
        header("Location: index.html");
    }else{
        echo "Error: " . $consulta . "<br>" . $conexion->error;
    }
    $conexion->close();
?>