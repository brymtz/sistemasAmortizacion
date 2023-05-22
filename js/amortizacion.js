
const monto = document.getElementById("monto");
const tiempo = document.getElementById("tiempo");

const btnCalcular = document.getElementById("btnCalcular");
const llenarTabla = document.querySelector("#lista-tabla tbody");

btnCalcular.addEventListener("click", () => {
  let interes;
  interes = parseInt(document.getElementById("interes").value); 
  let banco;
  banco = document.getElementById("Banco").value;
  switch (interes) {
    case 1:
        fetch('http://localhost/ProyectoEconomia/sistemasAmortizacion/backend/models/bancos.php?id='+banco)
        .then(response => response.json())
        .then(data => {
          // Convertir el resultado en formato de JavaScript
          var valor = parseFloat(data);
          console.log(valor);
        });
      break;
    case 2:
      alert("Microcredito");
      break;

    case 3:
      alert("Vivienda");
      break;

    case 4:
    alert("Estudiantil");
    break;

    default:
      alert("Error");
  }
  //calcularCuota(monto.value, interes.value, tiempo.value);
  //obtenerInteres();
  //console.log(interes);
  console.log(interes);
  console.log(banco);
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

  cuota =
    (monto * ((Math.pow(1 + interes / 100, tiempo) * interes) / 100)) /
    (Math.pow(1 + interes / 100, tiempo) - 1);

  for (let i = 1; i <= tiempo; i++) {
    pagoInteres = parseFloat(monto * (interes / 100));
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
