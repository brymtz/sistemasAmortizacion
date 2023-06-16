<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS ');

include "conexion.php";
include "../controllers/control_login.php";

$idBanco = $_SESSION["instTrabaja"];


$cadena ="";

$sqlGet="SELECT * FROM `instituciones` WHERE idInst ='$idBanco';";

$respuesta=$conexion->query($sqlGet);

$result=array();

if($respuesta->num_rows>0){

    while($filaeInteres=$respuesta->fetch_assoc()){
        $cadena .= '<option value="' . $filaeInteres["iConsumo"] . '">' ."Consumo" . '</option>';
        $cadena .= '<option value="' . $filaeInteres["iMicrocredito"] . '">' ."Microcredito" . '</option>';
        $cadena .= '<option value="' . $filaeInteres["iVivienda"] . '">' ."Vivienda" . '</option>';
        $cadena .= '<option value="' . $filaeInteres["iEstudiantil"] . '">' ."Estudiantil" . '</option>';
        array_push($result,$cadena);
    }

}else{

    $result="No hay datos";
}

echo json_encode($result);

?>