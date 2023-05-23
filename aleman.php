<?php
include_once ("backend/models/interes.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Método amortización aleman</title>

</head>

<!-- llamada a bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-6">
                <h2>Calcular amortización método aleman</h2>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" id="monto" placeholder="Ingresar monto">
                </div>
                <div class="form-group">
                    <label for="tiempo">Tiempo en Meses</label>
                    <input type="text" class="form-control" id="tiempo" placeholder="Ingresar cantidad de meses">
                </div>
                <br>
                <div class="form-group">
                    <label >Institución Financiera :</label>
                    <select id="Banco">
                        <?php echo todosBancos() ?>
                    </select>
                </div>

               <div class="form-group">
                    <label >Seleciona el interes:</label>
                   <select id="interes">
                        <option value="1">Consumo</option>
                        <option value="2">Microcredito</option>
                        <option value="3">Vivienda</option>
                        <option value="4">Estudiantil</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="btnCalcular">Calcular</button>
            </div>
            <div class="col-6">
                <table id="lista-tabla" class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Capital</th>
                            <th>Interes</th>
                            <th>Cuota</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="js/aleman.js"></script>
    <script src="js/days.min.js"></script>


    <!-- llamada a bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>


</html>