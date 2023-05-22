<?php
    
    include 'conexion.php';

    $ID=$_REQUEST["id"];

    $sqlListar= "SELECT iConsumo FROM instituciones where idInst='$ID' ";
    $respuesta=$conexion->query($sqlListar);
    if( $respuesta !== false && $respuesta -> num_rows> 0 ){
        $row = $respuesta->fetch_assoc();
        $result = $row['iConsumo'];    
        echo json_encode($result);   
    }else{
        $result="No hay instituciones";
    }

?>