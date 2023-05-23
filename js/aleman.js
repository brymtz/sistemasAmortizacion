const monto = document.getElementById("monto");
const tiempo = document.getElementById("tiempo");
const btnCalcular = document.getElementById("btnCalcular");
const llenarTabla = document.querySelector("#lista-tabla tbody");

btnCalcular.addEventListener("click", () => {
  let interes;
  interes = parseInt(document.getElementById("interes").value);
  let banco;
  banco = document.getElementById("Banco").value;
  if (banco != 0 && monto.value != 0 && tiempo.value != 0) {
    switch (interes) {
      case 1:
        fetch("../sistemasAmortizacion/backend/models/consumo.php?id=" + banco)
          .then((response) => response.json())
          .then((data) => {
            // Convertir el resultado en formato de JavaScript
            var valor = parseFloat(data);
            calcularCronograma(monto.value, valor, tiempo.value);
          });
        break;
      case 2:
        fetch("../sistemasAmortizacion/backend/models/micro.php?id=" + banco)
          .then((response) => response.json())
          .then((data) => {
            // Convertir el resultado en formato de JavaScript
            var valor = parseFloat(data);
            calcularCronograma(monto.value, valor, tiempo.value);
          });
        break;

      case 3:
        fetch("../sistemasAmortizacion/backend/models/vivienda.php?id=" + banco)
          .then((response) => response.json())
          .then((data) => {
            // Convertir el resultado en formato de JavaScript
            var valor = parseFloat(data);
            calcularCronograma(monto.value, valor, tiempo.value);
          });
        break;

      case 4:
        fetch(
          "../sistemasAmortizacion/backend/models/estudiantil.php?id=" + banco
        )
          .then((response) => response.json())
          .then((data) => {
            // Convertir el resultado en formato de JavaScript
            var valor = parseFloat(data);
            calcularCronograma(monto.value, valor, tiempo.value);
          });
        break;

      default:
        alert("Error");
    }
  } else {
    alert(
      "Compruebe que la institucion finaciera y los datos ingresados esten correctos"
    );
  }
});

function calcularCronograma(monto, interes, tiempo) {

  while(llenarTabla.firstChild) {
      llenarTabla.removeChild(llenarTabla.firstChild);
  }

  let mesActual = dayjs().add(1, 'month');
  let amortizacionConstante, pagoInteres, cuota;
  amortizacionConstante = monto / tiempo;
  for (let i = 1; i <= tiempo; i++) {
      pagoInteres = monto * (interes / 100);
      cuota = amortizacionConstante + pagoInteres;
      monto = monto - amortizacionConstante;

      let fecha = mesActual.format('DD-MM-YYYY');
      mesActual = mesActual.add(1, 'month');

      const row = document.createElement('tr');
      row.innerHTML = `
          <td>${fecha}</td>
          <td>${amortizacionConstante.toFixed(2)}</td>
          <td>${pagoInteres.toFixed(2)}</td>
          <td>${cuota.toFixed(2)}</td>
          <td>${monto.toFixed(2)}</td>
      `;
      llenarTabla.appendChild(row);
      
  }
}