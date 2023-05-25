<?php
    session_start();
    if(empty($_SESSION["id"])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/asesor.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Dashboard Asesor</title>
</head>
<body>
    <div class="wrapper">
            <!--Top menu -->
            <div class="sidebar">
                <div class="profile">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="foto_perfil">
                    <h3>
                        <?php 
                            echo $_SESSION["nombre"]." ".$_SESSION["apellido"];
                        ?>
                    </h3>
                    <p>
                        <?php 
                            echo $_SESSION["tipoBanco"]." ".$_SESSION["nombreBanco"];
                        ?>
                    </p>
                </div>
                <ul>
                    <li>
                        <a href="dashboardAsesor.php" class="active">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="item">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="tasas-de-interes.php">
                            <span class="icon"><i class="fa-solid fa-percent"></i></i></span>
                            <span class="item">Tasas de Intéres</span>
                        </a>
                    </li>
                    <li>
                        <a href="simulador-credito.php">
                            <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                            <span class="item">Simulador</span>
                        </a>
                    </li>
                    <li>
                        <a href="../backend/controllers/control_logout.php">
                            <span class="icon"><i class="fas fa-arrow-right-from-bracket"></i></span>
                            <span class="item">Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
            </div>
    </div>

    <!----SCRIPTS-->
    <script src="../js/asesor.js"></script>
</body>
</html>