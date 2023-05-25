<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS ');

include "conexion.php";
include "../controllers/control_login.php";
//include(dirname(__FILE__) . '../controllers/control_login.php');

$idBanco = $idInsti;

$sqlGet="SELECT * FROM `instituciones` WHERE idInst = 'ban01';";

$respuesta=$conexion->query($sqlGet);

$result=array();

if($respuesta->num_rows>0){

    while($filaeInteres=$respuesta->fetch_assoc()){
        array_push($result, $filaeInteres);
    }

}else{

    $result="No hay datos";
}

echo json_encode($result);
echo $idBanco;

?>