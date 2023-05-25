
document.addEventListener('DOMContentLoaded', function () {
    const listaB = document.getElementById('Banco');
    const listaIn = document.getElementById('BIntereses');

    cargarListadoB();

    function cargarListadoB() {
        let url = '../backend/models/QueryBancos.php';

        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                listaB.innerHTML = data;
            })
    }

    //recuperar el valor del id del comboBOx

    const accionBotones = (e) => {
        let valor = listaB.value;
        console.log(valor);
        getData(valor);
        getDataUpdate(valor);
    }

    listaB.addEventListener("change", accionBotones);

    function getData(dato) {
        let listaInteres = document.getElementById('Intereses');
        let url = "../backend/models/DataBank.php";
        let formaData = new FormData();
        formaData.append('campo', dato);
        fetch(url, {
            method: 'POST',
            body: formaData,
        })
            .then(response => response.json())
            .then(data => {
                listaInteres.innerHTML = data
            }).catch(err => console.log(err))
    }

    function getDataUpdate(dato) {
        let url = "../backend/models/updateIntereses.php";
        let formaData = new FormData();
        console.log(`el valor es ${dato}`);
        formaData.append('campo', dato);
        fetch(url, {
            method: 'POST',
            body: formaData,
        })
            .then(response => {
                if (response.ok) {
                    console.log('Datos enviados exitosamente');
                } else {
                    throw new Error('Error en la solicitud');
                }
            })
            .catch(error => {
                console.error('Error al enviar los datos:', error);
            });
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


});
