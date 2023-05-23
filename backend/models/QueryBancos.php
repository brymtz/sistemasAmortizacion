<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include ("conexion.php");

$sql = "SELECT	nomInst FROM instituciones";
$resul = $conexion->query($sql);
$lista= array();
while( $fila = $resul-> fetch_assoc() ){
    $aux = utf8_decode($fila['nomInst']);
    $data  = '<option value="'.$aux.'">'.$aux.'</option >';
    array_push($lista, $data );
}

echo json_encode($lista, JSON_UNESCAPED_UNICODE);

?>