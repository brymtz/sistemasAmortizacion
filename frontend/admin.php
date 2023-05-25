<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
    <link rel="stylesheet" href="css/admin.css">
    <script src="https://kit.fontawesome.com/c9de76fc23.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <div class="contenedor__padre">
        <div class="contenerdor__opciones">
            <div class="photo__user">
                <div class="img">
                    <img src="images/avatar.svg" alt="foto del user">
                    <br>
                    <p style="font-size:20px;">nombre User</p>
                    <p style="color:#b2dafa" >Banco</p>
                </div>
                <br><br>
                <div class="config">
                    <li><a href="adminC.php" target="allIframe">Configuración</a></li>
                    <li><a href="adminAs.php" target="allIframe">Insetar Asesor</a></li>
                    <li><a href="../backend/controllers/control_logout.php">Cerrar Sesión</a></li>
                </div>
            </div>
        </div>

        <div class="contenedor__configuracion">
            <iframe name="allIframe" src="adminC.php" width="100%" height="100%" frameborder="0"></iframe>
        </div>
    </div>

</body>
<script src="../js/admin.js" ></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</html>