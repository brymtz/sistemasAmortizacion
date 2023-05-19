<?php
$serverName = "localhost";
$userName = "root";
$passwd = "";
$dbName = "sistemas_amortizacion";
$conexion = mysqli_connect($serverName, $userName, $passwd, $dbName);

$mysqli = new mysqli($serverName, $userName, $passwd, $dbName);

if (!$mysqli)
{
die("Error: ". mysqli_connect_error());
}
?>