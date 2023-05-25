<?php
include "../backend/models/conexion.php";
session_start();

if(!empty($_POST["btnIngresar"])){
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password =  $_POST["password"];
        $sqlAdmin = "select * from administradores where userAdmin = '$usuario' and passwordAdmin = '$password'";
        $sqlAsesor = "select * from asesores where userAsesor = '$usuario' and passwordAsesor = '$password'";
        $query1 = $mysqli -> query($sqlAdmin);
        $query2 = $mysqli -> query($sqlAsesor);
        if($datos1=$query1 -> fetch_object()){
            $_SESSION["id"] = $datos1 -> idAdmin;
            $_SESSION["nombre"] = $datos1 -> nomAdmin;
            $_SESSION["apellido"] = $datos1 -> apeAdmin;
            header("location:../frontend/admin.php");
        }elseif($datos2=$query2 -> fetch_object()){
            $_SESSION["id"] = $datos2 -> idAsesor;
            $_SESSION["nombre"] = $datos2 -> nomAsesor;
            $_SESSION["apellido"] = $datos2 -> apeAsesor;
            $_SESSION["instTrabaja"] = $datos2 -> instPert;
            header("location: ../frontend/dashboardAsesor.php");
        }else{
            echo "<div class='alert alert-danger'> Usuario o contraseña incorrectos </div>";
        }
    } else {
        echo "<div class='alert alert-danger'> Campos vacios </div>";
    }
    
}

?>