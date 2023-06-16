<?php
//include "../backend/models/amortizaciones.php";
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}
$tablaAmortizacion = array();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/asesor.css">
    <link rel="stylesheet" type="text/css" href="css/credito.css">
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
                    echo $_SESSION["nombre"] . " " . $_SESSION["apellido"];
                    ?>
                </h3>
                <p>
                    <?php
                    echo $_SESSION["tipoBanco"] . " " . $_SESSION["nombreBanco"];
                    ?>
                </p>
            </div>
            <ul>
                <li>
                    <a href="dashboardAsesor.php">
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
                    <a href="simulador-credito.php" class="active">
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
    <!------------------>
    <div class="container">
        <h3 class="titulo">Simulador de crédito</h3>
    </div>
    <!--FORMULARIO-->
    <div class="container">
        <form class="formulario" action="amortizaciones.php" method="post">
            <div class="form-group">
                <label for="nombreCliente">Nombre del cliente:</label>
                <input type="text" class="form-control" id="nombreCliente" placeholder="Ingrese el nombre del cliente">
            </div>
            <div class="form-group">
                <label for="montoCredito">Monto:</label>
                <input type="number" class="form-control" id="montoCredito" name="montoCredito" placeholder="Ingrese el monto">
            </div>
            <div class="form-group">
                <label for="tiempoCredito">Tiempo:</label>
                <input type="number" class="form-control" id="tiempoCredito" name="tiempoCredito" placeholder="Tiempo en meses">
            </div>
            <div class="form-group">
                <label for="tipoCredito">Tipo de crédito:</label>
                <br>
                <div class="dropdown">
                <select id="tipoCredito" name="tipoCredito" class="dropdown-toggle">Opciones
                        <div class="dropdown-menu">
                            <option value="15.6">Consumo 15.6%</option>
                            <option value="25.12">Microcredito 25.12%</option>
                            <option value="8.49">Vivienda 8.49</option>
                            <option value="9.9">Estudiantil 9.9%</option>
                        </div>
                    </select>
                </div>
                <br>
                <!---
                <label for="tasaInteres">Tasa de Interés:</label>
                <br>
                <input type="text" class="form-control" id="tasaInteres" placeholder="La tasa de interés es" readonly>
                -->
            </div>
            <br>
            <div class="form-group">
                <!--<label for="tipoAmortizacion">Sistema de amortización:</label>-->
                <br>
                <!--
                <div class="dropdown">
                    <select class="dropdown-toggle">Opciones
                        <div class="dropdown-menu">
                            <option class="dropdown-item">Francés</option>
                            <option class="dropdown-item">Alemán</option>
                        </div>
                    </select>
                </div>
                -->
            <br>
            <br>
            <button type="submit" name="btnFrances" name="btnFrances" class="btn btn-primary">Calcular Frances</button>
            <button type="submit" name="btnAleman" id="btnAleman" class="btn btn-danger">Calcular Aleman</button>
        </form>
    </div>
    </div>
    <!--TABLA-->
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-striped table-hover" >
                    <thead>
                        <tr class="table-title">
                            <th>Pago No.</th>
                            <th>Cuota</th>
                            <th>Interés</th>
                            <th>Capital</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($tablaAmortizacion as $cuota) {?>
                        <td><?php echo $cuota["periodo"];?></td>
                        <td><?php echo $cuota["cuota"];?></td>
                        <td><?php echo $cuota["interes"];?></td>
                        <td><?php echo $cuota["abono"];?></td>
                        <td><?php echo $cuota["saldo"];?></td>
      <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>

        <!----SCRIPTS-->
        <script src="../js/asesor.js"></script>
</body>

</html>