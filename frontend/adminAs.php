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
    <title>Document</title>
</head>
<style>
    input[type="submit"]{
        width:150px;
        height:50px;
        color:white;
        background-color:#3b5998;
        border-radius:6px;
        margin-left:20px
    }
    input[type="submit"]:hover{
        font-weight: 300;
        transition: background-color .3s;
        background-color:white;
        color:#3b5998;
    }
    div .mySelect{
        width: 100px;
    }
</style>
<body>
    

            <br> 

            <center><h1>Personal de Asesores Bancarios</h1></center>
            <br>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="color:red; text-align:center">ID</th>
                        <th style="color:red; text-align:center">NOMBRE</th>
                        <th style="color:red; text-align:center">APELLIDO</th>
                        <th style="color:red; text-align:center">INSTITUCION</th>
                        <th style="color:red; text-align:center">USUARIO</th>
                        <th style="color:red; text-align:center">CONTRASEÑA</th>
                    </tr>
                </thead>
                <tbody id="asesores">
                </tbody>
            </table>

    <!--FLoating Button--->
    <a href="#" class="hero__cta float-button">Update</a>


    <!--Ventana Modadl--->
    <section class="modal ">
        <form class="modal__container" method="POST"  action="../backend/models/insertarAsesroes.php"">
            <h2 class="modal__title">Crear Asesor</h2>
                 <div class="campo__Asesor">
                     <Label  class="form__label">ID</Label>
                     <input type="text"  class="from__control" require name="ID">
                 </div>
                 <div class="campo__Asesor">
                     <Label  class="form__label">Nombre</Label>
                     <input type="text"  class="from__control" require name="nombre">
                 </div>
                 <div class="campo__Asesor">
                     <Label  class="form__label" >Apellido</Label>
                     <input type="text"  class="from__control" require name="apellido" >
                 </div>
                 <div class="campo__Asesor">
                     <Label  class="form__label">Usuario</Label>
                     <input type="text"  class="from__control" require name="user" >
                    </div>
                 <div class="campo__Asesor">
                     <Label  class="form__label">Contraseña</Label>
                     <input type="text"  class="from__control" require name="pass" >
                    </div>
                    <div class="campo__Asesor"  >
                        <Label  class="form__label" >Institucion</Label>   
                       <select name="institucion" id="institucion" class="mySelect" >
                           <option value="ban01">ban01</option>
                           <option value="ban02">ban02</option>
                           <option value="ban03">ban03</option>
                           <option value="ban04">ban04</option>
                           <option value="ban05">ban05</option>
                           <option value="ban06">ban06</option>
                           <option value="ban07">ban07</option>
                           <option value="ban08">ban08</option>
                           <option value="ban09">ban09</option>
                           <option value="ban10">ban10</option>
                       </select>
                    </div>
                 <div class="botones">
                    <input class="update" type="submit" value="INSERTAR">
                    <a href="#" class="modal__close">Cancelar</a>
                 </div>
        </form>
    </section>

</body>
<script src="../js/admin2.js" ></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>