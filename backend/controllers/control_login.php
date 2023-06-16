<?php

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
            header("location: ../frontend/dashboardAdmin.php");
        }elseif($datos2=$query2 -> fetch_object()){
            $_SESSION["id"] = $datos2 -> idAsesor;
            $_SESSION["nombre"] = $datos2 -> nomAsesor;
            $_SESSION["apellido"] = $datos2 -> apeAsesor;
            $_SESSION["instTrabaja"] = $datos2 -> instPert;
            $idInsti = $datos2 -> instPert;
            
            $sqlInstitucion = "select * from instituciones where idInst = '$idInsti'";
            $query3 = $mysqli -> query($sqlInstitucion);

            if($datos3=$query3 -> fetch_object()){
                $_SESSION["idBanco"] = $datos3 -> idInst;
                $_SESSION["nombreBanco"] = $datos3 -> nomInst;
                $_SESSION["tipoBanco"] = $datos3 -> tipoInst;
                $_SESSION["iConsumo"] = $datos3 -> iConsumo;
                $_SESSION["iMicrocredito"] = $datos3 -> iMicrocredito;
                $_SESSION["iVivienda"] = $datos3 -> iVivienda;
                $_SESSION["iEstudiantil"] = $datos3 -> iEstudiantil;
                $idBanco = $datos3 -> idInst;
                $consumo = $datos3 -> iConsumo;
                $micro = $datos3 -> iMicrocredito;
                $vivienda = $datos3 -> iVivienda;
                $estudiantil = $datos3 -> iEstudiantil;
            }

            header("location: ../frontend/dashboardAsesor.php");
        }else{
            echo "<div class='alert alert-danger'> Usuario o contraseña incorrectos </div>";
        }
    } else {
        echo "<div class='alert alert-danger'> Campos vacios </div>";
    }
    
}

?>