<?php
    $conexion = new mysqli("localhost","root","","negocio");
        if($conexion){
            echo "la conexion ha sido exitosa";
        }else{
            echo "algo anda mal"; 
        }
?>