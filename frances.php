<?php
include_once ("backend/models/interes.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Método amortización francés</title>

</head>

<!-- llamada a bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-6">
                <h2>Calcular amortización método francés</h2>
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
                    <label >Banco :</label>
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
                            <th>Cuota</th>
                            <th>Capital</th>
                            <th>Interés</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>

<script>
const monto = document.getElementById('monto');
const tiempo = document.getElementById('tiempo');
var tipo = document.getElementById('interes').value;
const btnCalcular = document.getElementById('btnCalcular');
const llenarTabla = document.querySelector('#lista-tabla tbody');
let interes;
function obtenerInteres(){
    switch (tipo){
        case "1":
            <?php ?>
            break;
        case "2":
         
            break;
        case "3":
         
            break;
        case "4":
         
            break;
      }

      
}

btnCalcular.addEventListener('click', () => {

  
    /* if(interes==="iConsumo"){
        alert("iConsumo");
        }else if(interes==="iMicrocredito"){
            alert("iMicrocredito");
        }*/
    //calcularCuota(monto.value, interes.value, tiempo.value);
})

function calcularCuota(monto, interes, tiempo){

    while(llenarTabla.firstChild){
        llenarTabla.removeChild(llenarTabla.firstChild);
    }

    let fechas = [];
    let fechaActual = Date.now();
    let mes_actual = moment(fechaActual);
    mes_actual.add(1, 'month');    

    let pagoInteres=0, pagoCapital = 0, cuota = 0;

    cuota = monto * (Math.pow(1+interes/100, tiempo)*interes/100)/(Math.pow(1+interes/100, tiempo)-1);

    for(let i = 1; i <= tiempo; i++) {

        pagoInteres = parseFloat(monto*(interes/100));
        pagoCapital = cuota - pagoInteres;
        monto = parseFloat(monto-pagoCapital);

        //Formato fechas
        fechas[i] = mes_actual.format('DD-MM-YYYY');
        mes_actual.add(1, 'month');

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${fechas[i]}</td>
            <td>${cuota.toFixed(2)}</td>
            <td>${pagoCapital.toFixed(2)}</td>
            <td>${pagoInteres.toFixed(2)}</td>
            <td>${monto.toFixed(2)}</td>
        `;
        llenarTabla.appendChild(row)
    }
}
</script>
    <script src="js/moment.js"></script>


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