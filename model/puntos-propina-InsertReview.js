//PUNTOS


/*-----------------------------------------------------------------------*/

//PROPINAS
const porcentajeInput = document.getElementById('porcentaje');
const valorPorcentaje = document.getElementById('valorPorcentaje');
const sumaTotalElement = document.getElementById('sumaTotal');

//Establecer el valor inicial del input range
porcentajeInput.value = 3;

let valorInicialCompra = parseFloat(sumaTotalElement.textContent.replace('€', ''));

//Función que se ejecuta cuando el input type range cambia
porcentajeInput.addEventListener('input', function () {
    actualizarPorcentaje();
    calcularTotal();
});

function actualizarPorcentaje() {
    const porcentaje = porcentajeInput.value;
    valorPorcentaje.textContent = porcentaje;
}

function omitirPropina() {
    porcentajeInput.value = 0;
    actualizarPorcentaje();
    calcularTotal();
}

function calcularTotal() {
    const porcentaje = parseFloat(porcentajeInput.value);
    const totalConPropina = valorInicialCompra + (valorInicialCompra * (porcentaje / 100));
    sumaTotalElement.textContent = totalConPropina.toFixed(2) + '€';
}

//Llamar a calcularTotal() al cargar la página
calcularTotal();
