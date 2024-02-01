//PUNTOS


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