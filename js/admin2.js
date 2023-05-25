//Cargar asesores

getData();
function getData() {
    let listaInteres = document.getElementById('asesores');
    let url = "../backend/models/queryAsesor.php";
    //let formaData = new FormData();
    console.log(`el valor es kj`);
    //formaData.append('campo', dato);
    fetch(url )
        .then(response => response.json())
        .then(data => {
            console.log(data);
            listaInteres.innerHTML = data
        }).catch(err => console.log(err))
}


/**Code de la ventana modal*/
const openModal = document.querySelector('.hero__cta');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal__close');

openModal.addEventListener('click', (e) => {
    e.preventDefault();
    //getData(dato);
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.remove('modal--show');
});
