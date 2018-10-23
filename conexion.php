<?php
    $conexion = new mysqli("localhost", "root", "1", "unisound");
    if($conexion){
        //echo "Se ha conectado a la DB.";
    }
    else{
        echo "No hemos podido conectar a la DB.";
    }
?>