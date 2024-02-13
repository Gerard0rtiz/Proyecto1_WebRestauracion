//PUNTOS
let puntosUsuarioActivo = 0;
let descuentoPorPuntos = 0;
let dineroPorPuntos = document.getElementById('descuentoPorPuntos');
let puntosGastados = 0;

//Obtener puntos del usuario activo al cargar la página
fetch('http://localhost/index.php?controller=api&action=obtener_puntos')
    .then(data => data.json())
    .then(puntos => {
        puntosUsuarioActivo = puntos;
        mostrarPuntosUserActivo();
        limitarPuntosMaximos();
        calcularTotal();
    });

function canjearPuntos() {
    //Obtener el saldo de puntos disponible antes de restar
    const saldoPuntosAnterior = puntosUsuarioActivo;

    const puntosCanjeados = parseFloat(document.getElementById('ptsInput').value);
    puntosGastados += puntosCanjeados;

    //Calcular el descuento
    const descuentoUnitario = puntosCanjeados / 200; // 100 puntos = 0.5 euros de descuento
    descuentoPorPuntos += descuentoUnitario;

    //Restar puntos al saldo disponible en la vista
    puntosUsuarioActivo -= puntosCanjeados;

    //Actualizar el saldo de puntos en la vista
    mostrarPuntosUserActivo();

    //Calcular el total inicial
    const sumaTotalElement = document.getElementById('sumaTotal');
    const totalInicial = parseFloat(sumaTotalElement.textContent.replace('€', '')) + descuentoPorPuntos;

    //Aplicar el descuento al total
    const nuevoTotal = totalInicial - descuentoUnitario;

    //Mostrar el descuento por puntos en el HTML
    const descuentoPorPuntosElement = document.getElementById('valor-descPuntos');
    descuentoPorPuntosElement.textContent = descuentoPorPuntos.toFixed(2) + '€';

    // Actualizar el total con el descuento
    sumaTotalElement.textContent = nuevoTotal.toFixed(2) + '€';
    dineroPorPuntos.value = descuentoPorPuntos;

    // Recalcular el total con la propina
    calcularTotal();

    // Actualizar la vista con los nuevos puntos
    mostrarPuntosUserActivo();

    //
    document.getElementById('puntosCanjeadosInput').value = puntosGastados;
}

//Event listener para actualizar el valor al salir del input
document.getElementById('ptsInput').addEventListener('blur', function () {
    ajustarValorPuntos();
});

//Event listener para el input de canjeo de puntos
document.getElementById('ptsInput').addEventListener('input', function () {
    ajustarValorPuntos();
});

//Calcular puntos que ganará el usuario
function calcularPuntosObtenidos(totalCompra) {
    const puntosObtenidos = Math.floor(totalCompra * 100);
    return puntosObtenidos;
}

// Función para limitar puntos máximos del usuario
function limitarPuntosMaximos() {
    const inputCanjeoPuntos = document.getElementById('ptsInput');
    if (inputCanjeoPuntos) {
        inputCanjeoPuntos.max = puntosUsuarioActivo;
    }
}

// Función para mostrar los puntos actuales del usuario activo
function mostrarPuntosUserActivo() {
    let ptsDispoElement = document.querySelector('.pts-dispo p');
    if (ptsDispoElement) {
        ptsDispoElement.innerText = `Saldo de puntos disponibles: ${puntosUsuarioActivo}`;
    }
}

// Event listener para el input de canjeo de puntos
document.getElementById('ptsInput').addEventListener('input', function () {
    ajustarValorPuntos();
});

// Función para ajustar el valor del input según el saldo de puntos
function ajustarValorPuntos() {
    const inputCanjeoPuntos = document.getElementById('ptsInput');
    if (inputCanjeoPuntos) {
        const nuevoValor = Math.min(inputCanjeoPuntos.value, puntosUsuarioActivo);
        inputCanjeoPuntos.value = nuevoValor;
    }

    // Recalcular el total con la propina después de ajustar los puntos
    calcularTotal();
}

// Event listener para actualizar el valor al salir del input
document.getElementById('ptsInput').addEventListener('blur', function () {
    ajustarValorPuntos();
});

// Obtener puntos del usuario activo al cargar la página
fetch('http://localhost/index.php?controller=api&action=obtener_puntos')
    .then(data => data.json())
    .then(puntos => {
        puntosUsuarioActivo = puntos;
        mostrarPuntosUserActivo();
        limitarPuntosMaximos();
    });

/*-----------------------------------------------------------------------*/

//PROPINAS
const porcentajeInput = document.getElementById('porcentaje');
const valorPorcentaje = document.getElementById('valorPorcentaje');
const sumaTotalElement = document.getElementById('sumaTotal');
const valorPropinaInput = document.getElementById('valorPropina');

let valorInicialCompra = parseFloat(sumaTotalElement.textContent.replace('€', ''));

// Recalcular el total con la propina al cambiar el porcentaje
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
    const totalConPropina = (valorInicialCompra - descuentoPorPuntos) + ((valorInicialCompra - descuentoPorPuntos) * (porcentaje / 100));
    const diferenciaPropina = totalConPropina - (valorInicialCompra - descuentoPorPuntos);
    sumaTotalElement.textContent = totalConPropina.toFixed(2) + '€';
    valorPropinaInput.value = diferenciaPropina.toFixed(2);

    //Calcular y mostrar los puntos obtenidos
    const puntosObtenidos = calcularPuntosObtenidos(totalConPropina);
    mostrarPuntosObtenidos(puntosObtenidos);

    //Asignar el valor de puntos obtenidos al input oculto
    const puntosGanadosInput = document.getElementById('puntosGanados');
    puntosGanadosInput.value = puntosObtenidos;

    //Mostrar el incremento por propina en el HTML
    const increPropElement = document.getElementById('incre-prop');
    increPropElement.textContent = diferenciaPropina.toFixed(2) + '€';
}

function mostrarPuntosObtenidos(puntosObtenidos) {
    const puntosObtenidosElement = document.querySelector('.puntos-obtenidos p');
    if (puntosObtenidosElement) {
        puntosObtenidosElement.innerText = `Con esta compra, conseguirá la siguiente cantidad de puntos: ${puntosObtenidos}`;
    }
}

calcularTotal();