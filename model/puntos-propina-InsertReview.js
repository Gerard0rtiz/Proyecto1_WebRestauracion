const porcentajeInput = document.getElementById('porcentaje');
const valorPorcentaje = document.getElementById('valorPorcentaje');
const sumaTotalElement = document.getElementById('sumaTotal');

let valorInicialCompra = parseFloat(sumaTotalElement.textContent.replace('€', ''));

porcentajeInput.addEventListener('input', actualizarPorcentaje);

function actualizarPorcentaje() {
    const porcentaje = porcentajeInput.value;
    valorPorcentaje.textContent = porcentaje;
}

function omitirPropina() {
    porcentajeInput.value = 0;
    calcularTotal();
}

function calcularTotal() {
    const porcentaje = parseFloat(porcentajeInput.value);
    const totalConPropina = valorInicialCompra + (valorInicialCompra * (porcentaje / 100));
    sumaTotalElement.textContent = totalConPropina.toFixed(2) + '€';
}