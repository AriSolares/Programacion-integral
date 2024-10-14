<?php
    $conexion = new mysqli("sunnylite.com.mx","sunnylit_Solecito","Solecito0811!","sunnylit_pruebasSolecito");
        if($conexion){
            echo "la conexion ha sido exitosa";
        }else{
            echo "algo anda mal"; 
        }
?>