<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

$dato = isset($_POST['dato'])? $_POST['dato'] : 'ban01';
//$dato = 'ban02';
//$idBank= 'ban01';

    include ("conexion.php");
    global $idBank;
    $sql = "SELECT	* FROM instituciones Where idInst='$dato'";
    $resul = $conexion->query($sql);
    $html="";
    if( $fila = $resul-> fetch_assoc() ){
        $html .= '<tr>';
        $html .= '<td>'.$fila['iConsumo'].'</td >';
        $html .= '<td>'.$fila['iMicrocredito'].'</td >';
        $html .= '<td>'.$fila['iVivienda'].'</td >';
        $html .= '<td>'.$fila['iEstudiantil'].'</td >';
        $html .= '<li><a href="#" class="hero__cta">Actualizar</a></li>';
        $html .= '<li><a href="#" class="hero__cta">Eliminar</a></li>';
        $html .= '</tr>';
    }

//echo json_encode($dato, JSON_UNESCAPED_UNICODE);
echo json_encode($html, JSON_UNESCAPED_UNICODE);






?>