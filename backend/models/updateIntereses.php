<?php

$idBank= isset($_POST['campo'])? $_POST['campo'] : 'ban01';

include ("conexion.php");
$consumo = $_POST['consumo'] ;
$microcredito = $_POST['microcredito'];
$vivienda = $_POST['vivienda'];
$estudiantil = $_POST['estudiantil'];

$sql = "UPDATE instituciones SET iConsumo='$consumo', iMicrocredito='$microcredito', iVivienda='$vivienda', iEstudiantil ='$estudiantil' Where idInst='$idBank' ";

if ($conexion->query($sql) === TRUE) {
    header("location:../../frontend/adminC.php");
} else {
    echo "Error al realizar la actualización: " . $conexion->error;
}

$conexion->close();

?>