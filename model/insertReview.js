//Variables
let pedidoId = encodeURIComponent(document.getElementById('pedidoID').value);
let username = encodeURIComponent(document.getElementById('nombreDeUsuario').value);

//funcion que se ejecuta al completar toda la informacion de la reseña y darle al boton
function sendReview() {
    let titulo = encodeURIComponent(document.getElementById('tituloReview').value);
    let puntos = encodeURIComponent(document.getElementById('puntosReview').value);
    let texto = encodeURIComponent(document.getElementById('textoReview').value);
    let apiUrl = `/index.php?controller=api&action=add_review&pedidoId=${pedidoId}&username=${username}&titulo=${titulo}&puntos=${puntos}&texto=${texto}`;

    fetch(apiUrl, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
        .then(respuesta => window.location.href = "index.php?controller=api&action=showReviews")
        .catch(error => {
            console.error('Error:', error);
        });
}

//Generación de qr con enlace a vista con informacion adicional del pedido
let urlQR = 'https://api.qrserver.com/v1/create-qr-code/?data=' + encodeURIComponent(`https://gerardortiz.bernat2024.es/index.php?controller=Producto&action=verPedido&pedido=${pedidoId}`) +'&amp;size=50x50';
document.getElementById('qrImage').src = urlQR; 