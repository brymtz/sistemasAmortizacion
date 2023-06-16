<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


function todosBancos(){
    include 'conexion.php';
    include "../controllers/control_login.php";
    $idBanco = $_SESSION["instTrabaja"];
    //global $idBanco;
    $sqlListar= "SELECT * FROM instituciones where idInst='$idBanco'";
    $respuesta=$conexion->query($sqlListar);
    $result=array();
    $cadena="<option value='0'>Seleccione un banco</option>";
    if($respuesta->num_rows>0){
    
        while($filaestudiante=$respuesta->fetch_assoc()){
            $cadena.='
      
      <option value="'.$filaestudiante['idInst'].'" >'.$filaestudiante['nomInst'].'</option>			  
      
      ';
            
        }
        return $cadena;

    }else{
        $result="No hay instituciones";
    }
}

function todosCreditos(){
    include 'conexion.php';
    include "../controllers/control_login.php";
    $idBanco1 = $_SESSION["instTrabaja"];

    $sqlListar= "SELECT iConsumo, iMicrocredito, iVivienda, iEstudiantil FROM instituciones where idInst='$idBanco1'";
    $respuesta=$conexion->query($sqlListar);
    $cadena="<option value='0'>Seleccione un banco</option>";
    if($respuesta->num_rows>0){
        while($fila = $respuesta -> fetch_assoc()){
            switch($fila){
                case $fila['iConsumo']:
                    $cadena.='<option value="'.$fila['iConsumo'].'" >Consumo</option>';
                break;
                case $fila['iMicrocredito']:
                    $cadena.='<option value="'.$fila['iMicrocredito'].'" >Microcredito</option>';
                break;
                case $fila['iVivienda']:
                    $cadena.='<option value="'.$fila['iVivienda'].'" >Vivienda</option>';
                break;
                case $fila['iEstudiantil']:
                    $cadena.='<option value="'.$fila['iEstudiantil'].'" >Estudiantil</option>';
                break;
            }
        }
    return $cadena;

    }else{
        $result="No hay instituciones";
    }
}

function detalleIntereses(){
    include ("conexion.php");
    $sql = "SELECT * FROM instituciones Where idInst= ban01";
    $resul = $conexion->query($sql);
    $intereses = array();
    if($resul !== false && $resul -> num_rows > 0){
        $fila = $resul -> fetch_assoc();
        $intereses[] = $fila["iConsumo"];
        $intereses[] = $fila["iMicrocredito"];
        $intereses[] = $fila["iVivienda"];
        $intereses[] = $fila["iEstudiantil"];
    }

    return json_encode($intereses, JSON_UNESCAPED_UNICODE);
}

?>