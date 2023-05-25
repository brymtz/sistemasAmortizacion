<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include ("conexion.php");
    
    $id=$_POST["ID"];
    $nombre= $_POST["nombre"];
    $ape= $_POST["apellido"];
    $inst= $_POST["institucion"];
    $user= $_POST["user"];
    $pass= $_POST["pass"];

    $sqlInsert="INSERT INTO asesores (idAsesor, nomAsesor, apeAsesor, instPert, userAsesor, passwordAsesor) VALUES ('$id', '$nombre', '$ape', '$inst', '$user', '$pass')";

    if($mysqli->query($sqlInsert)=== TRUE )
    {
        header("location:../../frontend/admin.php");
    }else
    {
        echo json_encode("Error".$sqlInsert.$mysqli->error);
    }

    $mysqli->close();
?>