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
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <h2>
        <?php
           echo $_SESSION["nombre"];
        ?>
    </h2>
    <a class="nav-item nav-link text-justify ml-3 hover-primary" href="../backend/controllers/control_logout.php">Cerrar Sesión</a>
</body>
</html>