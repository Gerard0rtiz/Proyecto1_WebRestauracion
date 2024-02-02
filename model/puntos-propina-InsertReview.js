//PUNTOS
let resultado;
let puntos = fetch('http://localhost/index.php?controller=api&action=obtener_puntos')
    .then(data => data.json())
    .then(puntos => {
        resultado = puntos;
        mostrarPuntosUserActivo();
    });

//Función para mostrar los puntos actuales del usuario activo
function mostrarPuntosUserActivo() {
    //Obtener nombre de usuario activo desde la sesión PHP
    let usuarioActivo = "<?php echo $_SESSION['activeUser']; ?>";

    //Obtener los puntos del usuario
    let puntosUsuarioActivo = resultado;

    //Mostrar los puntos en el HTML
    let ptsDispoElement = document.querySelector('.pts-dispo p');
    if (ptsDispoElement) {
        ptsDispoElement.innerText = `Saldo de puntos disponibles: ${puntosUsuarioActivo}`;
    }
}


/*-----------------------------------------------------------------------*/

//PROPINAS
const porcentajeInput = document.getElementById('porcentaje');
const valorPorcentaje = document.getElementById('valorPorcentaje');
const sumaTotalElement = document.getElementById('sumaTotal');
const valorPropinaInput = document.getElementById('valorPropina');

let valorInicialCompra = parseFloat(sumaTotalElement.textContent.replace('€', ''));

porcentajeInput.addEventListener('input', function () {
    actualizarPorcentaje();
    calcularTotal();
});

function actualizarPorcentaje() {
    const porcentaje = porcentajeInput.value;
    valorPorcentaje.textContent = porcentaje;
    valorPropinaInput.value = porcentaje;
}

function omitirPropina() {
    porcentajeInput.value = 0;
    actualizarPorcentaje();
    calcularTotal();
}

function calcularTotal() {
    const porcentaje = parseFloat(porcentajeInput.value);
    const totalConPropina = valorInicialCompra + (valorInicialCompra * (porcentaje / 100));
    const diferenciaPropina = totalConPropina - valorInicialCompra;
    sumaTotalElement.textContent = totalConPropina.toFixed(2) + '€';
    valorPropinaInput.value = diferenciaPropina.toFixed(2);
}

calcularTotal();