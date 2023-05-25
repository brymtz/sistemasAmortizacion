<?php

$idBank= isset($_POST['campo'])? $_POST['campo'] : 'ban01';

function modalWindows(){
    include ("conexion.php");
    global $idBank;
    $sql = "SELECT	* FROM instituciones Where idInst='$idBank'"; echo '<div class="valor__interes">';
    $resul = $conexion->query($sql);
    $html2="";
    if( $fila = $resul-> fetch_assoc() ){
        echo    '<div class="valor__interes">';
        echo        '<Label  class="form__label">Consumo</Label>';
        echo     '  <input type="number"  class="from__control" require name="consumo" value="'.$fila['iConsumo'].'">';
        echo     '</div>';
        echo     '<div class="valor__interes">';
        echo        '<Label  class="form__label">Microcredito</Label>';
        echo        '<input type="number"  class="from__control" require name="microcredito" value="'.$fila['iMicrocredito'].'">';
        echo     '</div>';
        echo     '<div class="valor__interes">';
        echo        '<Label  class="form__label">Vivienda</Label>';
        echo        '<input type="number"  class="from__control" require name="vivienda" value="'.$fila['iVivienda'].'">';
        echo     '</div>';
        echo     '<div class="valor__interes">';
        echo        '<Label  class="form__label">Estudiantil</Label>';
        echo        '<input type="number"  class="from__control" require name="estudiantil" value="'.$fila['iEstudiantil'].'">';
        echo     '</div>';
       
    }

    //echo json_encode($html2, JSON_UNESCAPED_UNICODE);

}

detalleIntereses();
function detalleIntereses(){
    include ("conexion.php");
    global $idBank;
    $sql = "SELECT	* FROM instituciones Where idInst='$idBank'";
    $resul = $conexion->query($sql);
    $html="";
    if( $fila = $resul-> fetch_assoc() ){
        $html .= '<td>' . $fila["iConsumo"] . '</td >';
        $html .= '<td>' . $fila["iMicrocredito"] . '</td >';
        $html .= '<td>' . $fila["iVivienda"] . '</td >';
        $html .= '<td>' . $fila["iEstudiantil"] . '</td >';
    }

    echo json_encode($html, JSON_UNESCAPED_UNICODE);
}







?>