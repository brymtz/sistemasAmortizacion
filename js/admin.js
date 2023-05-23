

const listaB = document.getElementById('Banco');

function cargarListadoB(){
    let url = 'http://localhost/ProyectoEconomia/sistemasAmortizacion/backend/models/QueryBancos.php';

    fetch( url )
        .then( response => response.json() )
        .then ( data =>{
        console.log(data);  
        listaB.innerHTML=data;
    } ) 
}



cargarListadoB();