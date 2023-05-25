<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include ("conexion.php");

$sql = "SELECT * FROM asesores";
$resul = $conexion->query($sql);
$html= "";
while( $fila = $resul-> fetch_assoc() ){
        $html .= '<tr>';
        $html .= '<td>'.$fila['idAsesor'].'</td >';
        $html .= '<td>'.$fila['nomAsesor'].'</td >';
        $html .= '<td>'.$fila['apeAsesor'].'</td >';
        $html .= '<td>'.$fila['instPert'].'</td >';
        $html .= '<td>'.$fila['userAsesor'].'</td >';
        $html .= '<td>'.$fila['passwordAsesor'].'</td >';
        $html .= '</tr>';
    
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>