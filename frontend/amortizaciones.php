<?php

if(isset($_POST['btnFrances'])){
    $intCapital = intval($_POST['montocredito']);
    $intInteres = floatval($_POST['tipoCredito']);
    $intPlazo = floatval($_POST['tiempoCredito']);
    $tablaAmortizacion = array();
    frances();
}elseif(isset($_POST['btnAleman'])){
    $intCapital = intval($_POST['montocredito']);
    $intInteres = floatval($_POST['tipoCredito']);
    $intPlazo = floatval($_POST['tiempoCredito']);
    $tablaAmortizacion = array();
    aleman();
}


function frances()
{
    /*$intCapital = $capital;
    $intInteres = $interes;
    $intPlazo = $plazo;
    $tablaAmortizacion = array();*/
    $intCapital = floatval($_POST['montocredito']);
    $intInteres = floatval($_POST['tipoCredito']);
    $intPlazo = floatval($_POST['tiempoCredito']);
    $tablaAmortizacion = array();

    $intInteresNominal = $intInteres / 12 / 100;
    $capitalSaldo = $intCapital;
    $fltCuota = round(($intCapital * $intInteresNominal) / (1 - ((1 + $intInteresNominal) ** (-1 * $intPlazo))), 2);
    for ($i = 1; $i <= $intPlazo; $i++) {
        $cuotaItem = array();
        $cuotaItem["periodo"] = $i;
        $cuotaItem["cuota"] = $fltCuota;
        $cuotaItem["interes"] = round($capitalSaldo * $intInteresNominal, 4);
        $cuotaItem["abono"] = $cuotaItem["cuota"] - $cuotaItem["interes"];
        if ($i == $intPlazo) {
            $cuotaItem["cuota"] = $capitalSaldo + $cuotaItem["interes"];
            $cuotaItem["abono"] = $capitalSaldo;
            $cuotaItem["saldo"] = 0;
        } else {
            $capitalSaldo -= $cuotaItem["abono"];
            $cuotaItem["saldo"] = $capitalSaldo;
        }

        $tablaAmortizacion[] = $cuotaItem;
    }
    foreach ($tablaAmortizacion as $cuota) {
        echo "<tr>
                <td>" . $cuota["periodo"] . "</td>
                <td>" . $cuota["cuota"] . "</td>
                <td>" . $cuota["interes"] . "</td>
                <td>" . $cuota["abono"] . "</td>
                <td>" . $cuota["saldo"] . "</td>
              </tr>";
    }
    return $tablaAmortizacion;
}

function aleman()
{
    $intCapital = floatval($_POST['montocredito']);
    $intInteres = floatval($_POST['tipoCredito']);
    $intPlazo = floatval($_POST['tiempoCredito']);
    $tablaAmortizacion = array();

    $intInteresNominal = $intInteres / 12 / 100;
    $capitalSaldo = $intCapital;
    $fltCuota = round($intCapital / $intPlazo, 2);

    for ($i = 1; $i <= $intPlazo; $i++) {
        $cuotaItem = array();
        $cuotaItem["periodo"] = $i;
        $cuotaItem["interes"] = round($capitalSaldo * $intInteresNominal, 2);
        $cuotaItem["cuota"] = $cuotaItem["interes"] + $fltCuota;
        $cuotaItem["capital"] = $cuotaItem["cuota"] - $cuotaItem["interes"];
        if ($i == $intPlazo) {
            $cuotaItem["cuota"] = $capitalSaldo + $cuotaItem["interes"];
            $cuotaItem["capital"] = $fltCuota;
            $cuotaItem["saldo"] = 0;
        } else {
            $capitalSaldo -= $cuotaItem["capital"];
            $cuotaItem["saldo"] = $capitalSaldo;
        }

        $tablaAmortizacion[] = $cuotaItem;
    }
    foreach ($tablaAmortizacion as $cuota) {
        echo "<tr>
                <td>" . $cuota["periodo"] . "</td>
                <td>" . $cuota["cuota"] . "</td>
                <td>" . $cuota["interes"] . "</td>
                <td>" . $cuota["capital"] . "</td>
                <td>" . $cuota["saldo"] . "</td>
              </tr>";
    }
    return $tablaAmortizacion;
}
