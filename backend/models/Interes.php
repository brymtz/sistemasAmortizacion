<?php

include 'conexion.php';

$sqlListar= "SELECT nomInst FROM instituciones";
$respuesta=$conexion->query($sqlListar);
$result=array();
if($respuesta->num_rows>0){

    while($filaestudiante=$respuesta->fetch_assoc()){

        array_push($result, $filaestudiante);
    }
}else{
    $result="No hay instituciones";
}

echo json_encode($result, JSON_FORCE_OBJECT);
?>