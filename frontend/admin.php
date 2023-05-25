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
                    <li><a href="#">Configuración</a></li>
                    <li><a href="#">Insetar Asesor</a></li>
                    <li><a href="../backend/controllers/control_logout.php">Cerrar Sesión</a></li>
                </div>
            </div>
        </div>

        <div class="contenedor__configuracion">

            <div class="form-group">
                <label style="color: black;">Institución Financiera :</label>
                <select id="Banco">
                </select>
            </div>

            <br> 
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Consumo</th>
                        <th>Micorcredito</th>
                        <th>Vivienda</th>
                        <th>Estudiantil</th>
                        <th colspan="2"><center> Ociones</center></th>
                    </tr>
                </thead>
                <tbody id="Intereses">
                    <tr>
                        <?php
                            include "../backend/models/DataBank.php";
                        ?> 
                        <td class="op"><li><a href="#" class="hero__cta">Actualizar</a></li></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Ventana Modadl--->
    <section class="modal ">
        <form class="modal__container" method="POST"  action="../backend/models/updateIntereses.php"">
            <h2 class="modal__title">Actualizar Intereses</h2>
            <?php
                echo modalWindows();
            ?>
            <input type="submit" value="ACTUALIZAR">
            <a href="#" class="modal__close">Cancelar</a>
        </form>
    </section>

</body>
<script src="../js/admin.js" ></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</html>