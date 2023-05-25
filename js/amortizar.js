
const monto = document.getElementById("monto");
const tiempo = document.getElementById("tiempo");
const tipo = document.getElementById("tipo");
const btnCalcular = document.getElementById("btnCalcular");
const llenarTabla = document.querySelector("#lista-tabla tbody");

btnCalcular.addEventListener("click", () => {
  let interes;
  interes = parseInt(document.getElementById("interes").value); 
  let banco;
  banco = document.getElementById("Banco").value;
  let sistema;
  sistema= document.getElementById("tipo").value;

if(banco!=0&&monto.value!=0&&tiempo.value!=0&&tiempo.value<=60&&tiempo.value>0){
  switch (interes) {
    case 1:
        fetch('../sistemasAmortizacion/backend/models/consumo.php?id='+banco)
        .then(response => response.json())
        .then(data => {
          // Convertir el resultado en formato de JavaScript
          var valor = parseFloat(data);
          if(sistema=="2"){
            calcularCuota(monto.value, valor, tiempo.value);
          }else if(sistema=="1"){
            calcularCronograma(monto.value, valor, tiempo.value);
          }  
        });
      break;
    case 2:
      fetch('../sistemasAmortizacion/backend/models/micro.php?id='+banco)
      .then(response => response.json())
      .then(data => {
        // Convertir el resultado en formato de JavaScript
        var valor = parseFloat(data);
        if(sistema=="2"){
          calcularCuota(monto.value, valor, tiempo.value);
        }else if(sistema=="1"){
          calcularCronograma(monto.value, valor, tiempo.value);
        }  
      });
      break;

    case 3:
      fetch('../sistemasAmortizacion/backend/models/vivienda.php?id='+banco)
      .then(response => response.json())
      .then(data => {
        // Convertir el resultado en formato de JavaScript
        var valor = parseFloat(data);
        if(sistema=="2"){
          calcularCuota(monto.value, valor, tiempo.value);
        }else if(sistema=="1"){
          calcularCronograma(monto.value, valor, tiempo.value);
        }  
      });
      break;

    case 4:
      fetch('../sistemasAmortizacion/backend/models/estudiantil.php?id='+banco)
      .then(response => response.json())
      .then(data => {
        // Convertir el resultado en formato de JavaScript
        var valor = parseFloat(data);
        if(sistema=="2"){
          calcularCuota(monto.value, valor, tiempo.value);
        }else if(sistema=="1"){
          calcularCronograma(monto.value, valor, tiempo.value);
        }  
      });
    break;

    default:
      alert("Error");
  }
}else{
  alert("Compruebe que la institucion finaciera y los datos ingresados esten correctos");
}

});

function calcularCuota(monto, interes, tiempo) {
  while (llenarTabla.firstChild) {
    llenarTabla.removeChild(llenarTabla.firstChild);
  }

  let fechas = [];
  let fechaActual = Date.now();
  let mes_actual = moment(fechaActual);
  mes_actual.add(1, "month");

  let pagoInteres = 0,
    pagoCapital = 0,
    cuota = 0;

 /* cuota =
    (monto * (( interes / 100) / 12) /
    (Math.pow(1 + interes / 100, tiempo) - 1));*/

    cuota = (monto * (interes/12/100)) / (1 - Math.pow(1 + (interes/12/100), -tiempo));

  for (let i = 1; i <= tiempo; i++) {
    pagoInteres = parseFloat((monto * (interes / 100))/12);
    pagoCapital = cuota - pagoInteres;
    monto = parseFloat(monto - pagoCapital);

    //Formato fechas
    fechas[i] = mes_actual.format("DD-MM-YYYY");
    mes_actual.add(1, "month");

    const row = document.createElement("tr");
    row.innerHTML = `
            <td>${fechas[i]}</td>
            <td>${cuota.toFixed(2)}</td>
            <td>${pagoCapital.toFixed(2)}</td>
            <td>${pagoInteres.toFixed(2)}</td>
            <td>${monto.toFixed(2)}</td>
        `;
    llenarTabla.appendChild(row);
  }
}

function calcularCronograma(monto, interes, tiempo) {

  while(llenarTabla.firstChild) {
      llenarTabla.removeChild(llenarTabla.firstChild);
  }

  let mesActual = dayjs().add(1, 'month');
  let amortizacionConstante, pagoInteres, cuota;
  amortizacionConstante = monto / tiempo;
  for (let i = 1; i <= tiempo; i++) {
      pagoInteres = (monto * (interes / 100))/12;
      cuota = amortizacionConstante + pagoInteres;
      monto = monto - amortizacionConstante;

      let fecha = mesActual.format('DD-MM-YYYY');
      mesActual = mesActual.add(1, 'month');

      const row = document.createElement('tr');
      row.innerHTML = `
          <td>${fecha}</td>
          <td>${cuota.toFixed(2)}</td>
          <td>${amortizacionConstante.toFixed(2)}</td>
          <td>${pagoInteres.toFixed(2)}</td>
          <td>${monto.toFixed(2)}</td>
      `;
      llenarTabla.appendChild(row);
      
  }
}